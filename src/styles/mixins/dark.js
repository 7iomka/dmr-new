const { replaceWithDarkRule } = require('./_selector-helpers.cjs');

module.exports = (atRule) => {
  replaceWithDarkRule(atRule, '.dark');
};
