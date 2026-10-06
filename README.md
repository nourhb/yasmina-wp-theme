# Yasmina

[WordPress 6.4+] [Full Site Editing] [GPL-2.0] [Version 1.0.0]

Yasmina is an elegant WordPress block theme (Full Site Editing) designed for **beauty salons, spas, and cosmetics brands**. Soft blush tones, warm cream backgrounds, gold accents, and refined serif typography create a luxurious, feminine feel — with generous whitespace and delicate details throughout.

## Features

- **Full Site Editing** — edit headers, footers, and every template visually in the Site Editor
- **Beauty-salon design system** — blush, rose, rosewood, cream, gold, and charcoal palette with matching gradients, duotones, and soft shadows
- **Fluid typography** — 8 font sizes from Tiny to Colossal, Cormorant Garamond display serif + Jost body sans (loaded from Google Fonts)
- **9 ready-made block patterns** — hero, services grid, price list, booking CTA, testimonials, gallery strip, team, opening hours, stats band
- **4 custom block styles** — Pill button, Outline Gold button, Large quote, Card group
- **"Noir" style variation** — one-click evening dark mode in deep plum with gold accents
- **8 templates** — front page, blog index, single post, page, wide page, archive, search, and an elegant 404
- **Motion with respect** — scroll-reveal and back-to-top JavaScript guarded by `prefers-reduced-motion`; fully readable with JavaScript disabled
- **Accessibility touches** — visible focus states, semantic landmarks, keyboard-friendly navigation
- **Print stylesheet** — clean print output for price lists and service pages
- **Translation-ready** — text domain `yasmina`, all strings wrapped for translation

## Installation

1. Download or clone this repository into your WordPress themes directory:
   `wp-content/themes/yasmina-wp-theme/`
2. In the WordPress admin, go to **Appearance → Themes** and activate **Yasmina**.
3. Open **Appearance → Editor** to customize templates, or **Appearance → Customize** for the Noir style variation.
4. Assign menus under **Appearance → Menus** (Primary, Footer, Social) or directly in the navigation blocks.
5. Build pages from the included patterns via the block inserter (Patterns → Yasmina).

No build step or dependencies are required.

## Pattern Catalog

| Pattern | Slug | Description |
|---|---|---|
| Hero Beauty | `yasmina/hero-beauty` | Eyebrow label, serif headline, subtext, two CTAs, salon imagery |
| Services Grid | `yasmina/services-grid` | 6 services (haircut, nails, facial, bridal, massage, balayage) with starting prices |
| Price List | `yasmina/price-list` | Elegant menu with dotted leaders, grouped Hair / Nails / Skin |
| Booking CTA | `yasmina/booking-cta` | Blush gradient banner — "Reserve your moment of radiance" |
| Testimonials | `yasmina/testimonials` | 3 client quotes with names and star ratings |
| Gallery Strip | `yasmina/gallery-strip` | 4-image row showcasing salon work |
| Team Stylists | `yasmina/team-stylists` | 4 specialists with roles and short bios |
| Opening Hours | `yasmina/opening-hours` | Hours card — Mon–Sat 9:00–19:00, Sun closed, walk-ins note |
| Stats Band | `yasmina/stats-band` | 12+ years, 8k happy clients, 4.9 rating, 15 experts |

## Customization Guide

- **Colors & fonts** — Adjust everything in `theme.json` (palette, gradients, font families, sizes, spacing, shadows). Changes apply site-wide.
- **Buttons** — Default buttons are pill-shaped; apply the *Pill* or *Outline Gold* block styles for variants.
- **Cards** — Apply the *Card* block style to any Group block for the hover-lift effect.
- **Quotes** — Apply the *Large* block style to Quote blocks for the oversized serif treatment.
- **Price rows** — The dotted-leader menu uses the `yasmina-price-item` / `yasmina-price-name` / `yasmina-price` classes; duplicate any row in the Price List pattern to add services.
- **Scroll reveal** — Add `data-reveal` to any block's advanced CSS anchor... (via Additional CSS class field, then the attribute in Code Editor) to fade it in on scroll.
- **Front-end polish** — Hover states, dividers, gallery zoom, and print rules live in `style.css`.

## Style Variation: Noir

**Appearance → Editor → Styles → Noir** switches the theme to an evening dark mode: deep plum backgrounds, blush text, and glowing gold accents — ideal for "evening glam" landing pages. Defined in `styles/noir.json`.

## FAQ

**Does Yasmina need any plugins?**
No. Everything is built with core blocks.

**Can I use it for a different business?**
Yes — replace the salon copy and imagery; the design system suits any elegant brand.

**Where do I change the phone number and address?**
In the header and footer template parts (Site Editor → Template Parts) and the Booking CTA / Opening Hours patterns.

**Is the theme translation-ready?**
Yes. The text domain is `yasmina`; add your `.po` / `.mo` files to the `languages/` directory.

**Which WordPress version is required?**
WordPress 6.4 or higher, PHP 7.4 or higher.

## Changelog

### 1.0.0
- Initial release: full FSE theme with 8 templates, 2 template parts, 9 patterns, 4 block styles, Noir style variation, and complete blush-and-gold design system.

## License

Yasmina is licensed under the **GNU General Public License v2 or later**. See `LICENSE` for the full text.

## Credits

Designed and developed by **Nour El Houda Bouajila**.

- Portfolio: https://nour-el-houda-bouajila.rf.gd/
- GitHub: https://github.com/Nourhb
- LinkedIn: https://www.linkedin.com/in/nour-el-houda-bouajila
