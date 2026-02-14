const _ = require('lodash');
const defaultTheme = require('tailwindcss/defaultTheme');
const theme = require('./theme.json');
const tailpress = require('@jeffreyvr/tailwindcss-tailpress');

module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './resources/css/*.css',
    './resources/js/*.js',
    './safelist.txt',
    './node_modules/tw-elements/dist/js/**/*.js',
  ],
  safelist: [
    {
      // Paddings
      pattern: /^\-?m(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    {
      // Margins
      pattern: /^p(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    {
      // Rounded Corners
      pattern: /rounded-(none|md|lg|full)/,
    },
    'text-left',
    'text-right',
    'text-center',
    'mx-auto',
    'bg-gray-100',
    'max-w-none',
    'max-w-screen-sm',
    'max-w-screen-md',
    'max-w-screen-lg',
    'max-w-screen-xl',
    'aspect-w-16',
    'aspect-h-9',
  ],
  theme: {
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '1rem',
        lg: '2rem',
      },
    },
    extend: {
      colors: tailpress.colorMapper(
        tailpress.theme('settings.color.palette', theme)
      ),
      fontSize: tailpress.fontSizeMapper(
        tailpress.theme('settings.typography.fontSizes', theme)
      ),
      fontFamily: {
        sans: ['filson-soft', ...defaultTheme.fontFamily.sans],
      },
      zIndex: {
        100: '100',
      },
      maxWidth: {
        '1/4': '25%',
        '1/3': '33.33%',
        '1/2': '50%',
      },
    },
    screens: {
      xs: '480px',
      sm: '640px',
      md: '768px',
      //lg: tailpress.theme('settings.layout.contentSize', theme),
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px',
    },
    aspectRatio: {
      auto: 'auto',
      square: '1 / 1',
      video: '16 / 9',
      1: '1',
      2: '2',
      3: '3',
      4: '4',
      5: '5',
      6: '6',
      7: '7',
      8: '8',
      9: '9',
      10: '10',
      11: '11',
      12: '12',
      13: '13',
      14: '14',
      15: '15',
      16: '16',
    },
  },
  // corePlugins: {
  //   aspectRatio: false,
  // },
  plugins: [
    tailpress.tailwind,
    require('tw-elements/dist/plugin'),
    require('tailwind-scrollbar'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
  ],
  variants: {
    scrollbar: ['rounded'],
  },
};
