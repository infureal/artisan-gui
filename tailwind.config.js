const colors = require('tailwindcss/colors')

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [
      './resources/views/**/*.blade.php'
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
