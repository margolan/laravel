module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
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