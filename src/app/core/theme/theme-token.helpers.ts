type CssVarName = `--${string}`;

type HslVarOptions = {
  /**
   * Adds alpha support to the generated HSL color.
   *
   * - `true` is used for Tailwind config colors and outputs `<alpha-value>`.
   * - A string value can be used for fixed alpha values like `0.5` or `50%`.
   * - Omit this option for plain PrimeNG preset tokens.
   */
  alpha?: true | string;
};

/**
 * Standard Tailwind/PrimeNG color scale steps.
 */
export const colorSteps = ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900', '950'] as const;

/**
 * Surface scale includes `0` in addition to the regular color scale.
 */
export const surfaceSteps = ['0', ...colorSteps] as const;

/**
 * Primitive palettes that are currently controlled by our HSL CSS variables.
 *
 * Add more palette names here when you define the corresponding
 * `--hsl-{palette}-{step}` variables in CSS.
 */
export const appPrimitivePaletteNames = ['slate', 'zinc', 'emerald', 'sky', 'amber', 'red'] as const;

export type ColorStep = (typeof colorSteps)[number];
export type SurfaceStep = (typeof surfaceSteps)[number];

export type HslColorScale = Record<ColorStep, string>;
export type HslSurfaceScale = Record<SurfaceStep, string>;

/**
 * Builds an HSL color string from a full CSS custom property name.
 *
 * Examples:
 * - hslVar('--hsl-red-500')
 *   -> hsl(var(--hsl-red-500))
 *
 * - hslVar('--hsl-red-500', { alpha: true })
 *   -> hsl(var(--hsl-red-500) / <alpha-value>)
 *
 * - hslVar('--hsl-red-500', { alpha: '50%' })
 *   -> hsl(var(--hsl-red-500) / 50%)
 */
export function hslVar(name: CssVarName, options: HslVarOptions = {}): string {
  if (options.alpha === true) {
    return `hsl(var(${name}) / <alpha-value>)`;
  }

  if (typeof options.alpha === 'string') {
    return `hsl(var(${name}) / ${options.alpha})`;
  }

  return `hsl(var(${name}))`;
}

/**
 * Builds an HSL color string from a token name without the `--hsl-` prefix.
 *
 * Example:
 * - hslToken('red-500')
 *   -> hsl(var(--hsl-red-500))
 */
export function hslToken(name: string, options?: HslVarOptions): string {
  return hslVar(`--hsl-${name}` as `--hsl-${string}`, options);
}

/**
 * Builds a nested color scale object for PrimeNG primitive/semantic palettes
 * or Tailwind nested color palettes.
 *
 * Example:
 * hslScale('red')
 *
 * Result:
 * {
 *   50: 'hsl(var(--hsl-red-50))',
 *   100: 'hsl(var(--hsl-red-100))',
 *   ...
 *   950: 'hsl(var(--hsl-red-950))'
 * }
 */
export function hslScale(name: string, options?: HslVarOptions): HslColorScale {
  return Object.fromEntries(colorSteps.map((step) => [step, hslToken(`${name}-${step}`, options)])) as HslColorScale;
}

/**
 * Builds the semantic surface scale.
 *
 * Unlike regular color palettes, surface includes the `0` step:
 * `surface-0`, `surface-50`, ..., `surface-950`.
 */
export function hslSurfaceScale(options?: HslVarOptions): HslSurfaceScale {
  return Object.fromEntries(
    surfaceSteps.map((step) => [step, hslToken(`surface-${step}`, options)]),
  ) as HslSurfaceScale;
}

/**
 * Builds a flat Tailwind color scale.
 *
 * Example:
 * hslFlatScale('primary', colorSteps)
 *
 * Result:
 * {
 *   'primary-50': 'hsl(var(--hsl-primary-50))',
 *   'primary-100': 'hsl(var(--hsl-primary-100))',
 *   ...
 * }
 *
 * This is useful for aliases like `text-primary-500`,
 * where we want flat color names instead of nested objects.
 */
export function hslFlatScale<T extends readonly string[]>(
  name: string,
  steps: T,
  options?: HslVarOptions,
): Record<`${string}-${T[number]}`, string> {
  return Object.fromEntries(steps.map((step) => [`${name}-${step}`, hslToken(`${name}-${step}`, options)])) as Record<
    `${string}-${T[number]}`,
    string
  >;
}

/**
 * Builds multiple nested HSL palettes at once.
 *
 * Example:
 * hslPalettes(['slate', 'red'])
 *
 * Result:
 * {
 *   slate: {
 *     50: 'hsl(var(--hsl-slate-50))',
 *     ...
 *   },
 *   red: {
 *     50: 'hsl(var(--hsl-red-50))',
 *     ...
 *   }
 * }
 */
export function hslPalettes<T extends readonly string[]>(
  names: T,
  options?: HslVarOptions,
): Record<T[number], HslColorScale> {
  return Object.fromEntries(names.map((name) => [name, hslScale(name, options)])) as Record<T[number], HslColorScale>;
}
