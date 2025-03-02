module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      borderWidth: {
        '1': '1px'
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
};