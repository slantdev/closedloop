# Closed Loop WordPress Theme

A custom WordPress theme for Closed Loop, built using the [TailPress](https://tailpress.io/) boilerplate. This theme leverages Tailwind CSS for styling and ACF Pro for a modular page-building experience.

## Project Overview

- **Type:** WordPress Theme
- **Main Technologies:**
  - **Backend:** PHP (WordPress)
  - **Frontend Styling:** [Tailwind CSS](https://tailwindcss.com/)
  - **Dynamic Content:** [ACF Pro](https://www.advancedcustomfields.com/) (Flexible Content)
  - **JS Bundler:** [esbuild](https://esbuild.github.io/)
  - **CSS Processor:** PostCSS
  - **UI Libraries:** [Swiper.js](https://swiperjs.com/) (Sliders), [TW Elements](https://tw-elements.com/) (UI Components)

### Architecture

The theme follows a modular approach, primarily driven by ACF Flexible Content layouts defined in `template-parts/page-builder.php`.

- **`functions.php`**: Core theme setup and asset enqueuing.
- **`inc/`**: Modularized PHP logic including ACF configuration, helpers, filters, and custom utilities.
- **`template-parts/sections/`**: Individual templates for each ACF Flexible Content layout.
- **`template-parts/components/`**: Smaller, reusable UI components.
- **`resources/`**: Source files for CSS and JavaScript.
- **`assets/`**: Compiled and minified assets (CSS, JS) and images.
- **`acf-json/`**: Local JSON storage for ACF field groups, ensuring version control for database-driven fields.

## Building and Running

### Development

To start developing and watch for changes in CSS and JS:

```bash
npm install
npm run watch
```

To include BrowserSync (proxied to `closedloop.local`):

```bash
npm run watch-sync
```

### Production

To create a minified, production-ready build of assets:

```bash
npm run production
```

## Development Conventions

- **Styling:** Use Tailwind CSS utility classes. Custom styles should be added sparingly in `resources/css/app.css` or within its partials.
- **Page Builder:** New layouts should be added as ACF Flexible Content fields. The corresponding template should be created in `template-parts/sections/` and registered in `template-parts/page-builder.php`.
- **ACF Field Groups:** Ensure ACF JSON is enabled (it is by default in this theme) so that field group changes are saved to `acf-json/`.
- **Assets:** Always modify files in `resources/` and compile them into `assets/`. Never edit files in `assets/` directly.
- **Naming:** Follow WordPress coding standards for PHP and use descriptive, hyphenated names for template parts and CSS classes where necessary.
