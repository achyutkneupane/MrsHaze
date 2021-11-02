module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'turq':'#00CED1',
        'bsred' : '#d9534f'
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
