/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      borderWidth: {
        '1': '1px'
      },
      boxShadow: {
        '3xl': '5px 5px 10px',
      }
    },
  },
  plugins: [],
}

