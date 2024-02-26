/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php'
  ],
  theme: {
    fontFamily:{
      'roboto': ['Roboto', 'sans-serif'],
    },
    extend: {
      colors:{
        'blue': '#0f5288'
      },
      animation: {
        'loop-scroll': 'loop-scroll 20s linear infinite',
        'loop-scroll-reverse': 'loop-scroll 10s linear infinite',
      },
      keyframes: {
        'loop-scroll': {
          from: { transform: 'translateX(0)' },
          to: { transform: 'translateX(-100%)' },
        },
        'loop-scroll-reverse': {
          from: { transform: 'translateX(90%)' },
          to: { transform: 'translateX(0%)' },
        }
      },
    },
  },
  plugins: [
    require("tailwindcss-animate"),
  ],
}

