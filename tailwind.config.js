module.exports = {
  mode: 'jit',
  purge: [
    './src/**/*.html',
    './src/**/*.js',
    './src/**/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
