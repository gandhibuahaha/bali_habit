// Converts px values inside Tailwind arbitrary-value rules in public/assets/css/output.css
// (e.g. .text-[13.5px], .w-[260px], .shadow-[0_2px_10px_...]) to rem, so they scale with the
// root font size set at the bottom of public/assets/css/input.css. Breakpoints stay in px.
//
// Run after every rebuild of output.css:   node scripts/px-to-rem.mjs
// Re-running is safe: converted rules no longer contain px and are left alone.
// Class names are unchanged, so the views need no edits.
import { readFileSync, writeFileSync } from 'node:fs';

const file = new URL('../public/assets/css/output.css', import.meta.url);
const css = readFileSync(file, 'utf8');

const PX = /(\d*\.?\d+)px\b/g;
const toRem = (n) => `${Number((parseFloat(n) / 16).toFixed(5))}rem`;

let rules = 0;
let values = 0;

// Each match is one innermost declaration block plus the selector text before it;
// for the first rule inside an @media block, that text starts after the media's "{".
const out = css.replace(/([^{}]*)\{([^{}]*)\}/g, (block, selector, decls) => {
  if (!selector.includes('\\[') || !PX.test(decls)) return block;
  PX.lastIndex = 0;
  rules += 1;
  const converted = decls.replace(PX, (_, n) => {
    values += 1;
    return toRem(n);
  });
  return `${selector}{${converted}}`;
});

if (out !== css) writeFileSync(file, out);
console.log(`output.css: converted ${values} px values in ${rules} arbitrary-value rules to rem.`);

if (!/html\s*\{[^}]*font-size:\s*clamp\(/.test(out)) {
  console.warn('Warning: output.css has no html { font-size: clamp(...) } rule, so pages will not scale.');
  console.warn('Rebuild output.css from input.css, or copy the rule at the bottom of input.css.');
}
