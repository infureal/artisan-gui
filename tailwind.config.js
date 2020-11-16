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
      }
    },
  },
  variants: {},
  plugins: [],
}
