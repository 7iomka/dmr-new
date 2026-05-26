const fs = require('fs');
const path = require('path');

const rootDir = path.resolve(__dirname, '..', '..');
const srcDir = path.join(rootDir, 'src');
const baseline = require('./apply-baseline.json');
const structuralApplyBaseline = require('./structural-apply-baseline.json');

const forbiddenDirectives = [
  { name: '@screen', pattern: /@screen\b/g },
  { name: '@variant', pattern: /@variant\b/g },
  { name: '@reference', pattern: /@reference\b/g },
];

const applyPattern = /@apply\b/g;
const structuralApplyPattern = /@apply[^;]*(?:\bspace-[xy]-|\bdivide-[xy](?:-|\b))/g;
const forbiddenStructuralMixinPattern = /@(define-)?mixin\s+(?:space-[xy]|divide-[xy])\b/g;

const listCssFiles = (dir) => {
  const entries = fs.readdirSync(dir, { withFileTypes: true });
  const files = [];

  entries.forEach((entry) => {
    const fullPath = path.join(dir, entry.name);

    if (entry.isDirectory()) {
      files.push(...listCssFiles(fullPath));
      return;
    }

    if (entry.isFile() && entry.name.endsWith('.css')) {
      files.push(fullPath);
    }
  });

  return files;
};

const countMatches = (content, pattern) => Array.from(content.matchAll(pattern)).length;

const failures = [];
const currentApplyCounts = {};
const currentStructuralApplyCounts = {};

listCssFiles(srcDir).forEach((filePath) => {
  const relativePath = path.relative(rootDir, filePath);
  const content = fs.readFileSync(filePath, 'utf8');

  forbiddenDirectives.forEach(({ name, pattern }) => {
    const count = countMatches(content, pattern);

    if (count > 0) {
      failures.push(`${relativePath}: contains ${count} ${name} directive(s)`);
    }
  });

  const applyCount = countMatches(content, applyPattern);

  if (applyCount > 0) {
    currentApplyCounts[relativePath] = applyCount;
  }

  const allowedApplyCount = baseline[relativePath] || 0;

  if (applyCount > allowedApplyCount) {
    failures.push(
      `${relativePath}: @apply count increased from ${allowedApplyCount} to ${applyCount}; replace new usage with direct CSS`,
    );
  }

  const structuralMixinCount = countMatches(content, forbiddenStructuralMixinPattern);

  if (structuralMixinCount > 0) {
    failures.push(
      `${relativePath}: contains ${structuralMixinCount} forbidden space/divide mixin directive(s); use gap or explicit separators`,
    );
  }

  const structuralApplyCount = countMatches(content, structuralApplyPattern);

  if (structuralApplyCount > 0) {
    currentStructuralApplyCounts[relativePath] = structuralApplyCount;
  }

  const allowedStructuralApplyCount = structuralApplyBaseline[relativePath] || 0;

  if (structuralApplyCount > allowedStructuralApplyCount) {
    failures.push(
      `${relativePath}: @apply space/divide count increased from ${allowedStructuralApplyCount} to ${structuralApplyCount}; use gap or explicit separators`,
    );
  }
});

const baselineTotal = Object.values(baseline).reduce((total, count) => total + count, 0);
const currentTotal = Object.values(currentApplyCounts).reduce((total, count) => total + count, 0);
const structuralBaselineTotal = Object.values(structuralApplyBaseline).reduce((total, count) => total + count, 0);
const structuralCurrentTotal = Object.values(currentStructuralApplyCounts).reduce((total, count) => total + count, 0);

if (currentTotal > baselineTotal) {
  failures.push(`total @apply count increased from ${baselineTotal} to ${currentTotal}`);
}

if (structuralCurrentTotal > structuralBaselineTotal) {
  failures.push(
    `total @apply space/divide count increased from ${structuralBaselineTotal} to ${structuralCurrentTotal}`,
  );
}

if (failures.length > 0) {
  console.error('CSS directive guard failed:');
  failures.forEach((failure) => console.error(`- ${failure}`));
  process.exit(1);
}

console.log(
  `CSS directive guard passed. @apply migration baseline: ${currentTotal}/${baselineTotal}; structural apply baseline: ${structuralCurrentTotal}/${structuralBaselineTotal}.`,
);
