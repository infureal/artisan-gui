const colors = require('tailwindcss/colors')

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        mono: ['Roboto Mono', 'monospace']
      },
      colors: {
        primary: colors.red,
      }
    },
  },
  variants: {},
  plugins: [],
}
