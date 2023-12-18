/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily:{
      'roboto': ['Roboto', 'sans-serif'],
    },
    extend: {
      colors:{
        'blue': '#0f5288'
      }
    },
  },
  plugins: [],
}

