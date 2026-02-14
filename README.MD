# Closed Loop WordPress Theme

A custom, high-performance WordPress theme for Closed Loop, built on the TailPress boilerplate. This theme utilizes Tailwind CSS for rapid UI development and ACF Pro (Advanced Custom Fields) for a modular, component-based page-building experience.

## Features

- **Tailwind CSS Integration:** Full utility-first CSS workflow.
- **Modular Page Builder:** ACF Flexible Content layouts allow for dynamic page construction using pre-defined sections.
- **Modern Asset Pipeline:** Uses `esbuild` for fast JS bundling and `PostCSS` for CSS processing.
- **Responsive Design:** Mobile-first approach with Tailwind's responsive utilities.
- **UI Components:** Integrated with Swiper.js for sliders and custom interactive elements.

## Getting Started

### Prerequisites

- Node.js and npm
- A local WordPress development environment (e.g., Local WP, Laravel Valet, or Docker)

### Installation

1.  Clone the repository into your WordPress `wp-content/themes` directory.
2.  Navigate to the theme directory:
    ```bash
    cd wp-content/themes/closedloop
    ```
3.  Install dependencies:
    ```bash
    npm install
    ```

### Development

To start the development server and watch for changes in your CSS and JS files:

```bash
npm run watch
```

If you are using a local proxy (e.g., `closedloop.local`), you can use BrowserSync:

```bash
npm run watch-sync
```

### Production

To generate minified and optimized assets for production:

```bash
npm run production
```

## Theme Structure

- `/acf-json`: Synchronized ACF field group definitions in JSON format.
- `/assets`: Compiled CSS, JS, and image assets.
- `/inc`: Modular PHP functions, helpers, and theme configuration.
- `/resources`: Source files for Tailwind CSS and JavaScript.
- `/template-parts`: Reusable PHP template parts, including `sections` for the page builder and `components` for UI elements.
- `template-parts/page-builder.php`: The main logic for rendering ACF Flexible Content sections.

## Development Guidelines

- **Template Parts:** Always use `get_template_part()` for including components and sections.
- **ACF Fields:** When adding or modifying ACF fields, ensure the changes are synced to the `/acf-json` folder for version control.
- **Styling:** Avoid writing custom CSS in files; prefer using Tailwind CSS utility classes directly in the PHP templates.
- **JS:** Modularize JavaScript in `/resources/js/app.js` and use `esbuild` for bundling.

## Credits

Developed by Slant Agency.
