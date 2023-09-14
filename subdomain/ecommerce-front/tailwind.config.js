/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
  theme: {
    extend: {
      colors: {
        tahiti: {
          test: "rgb(17 24 39 / 1)",
        },
      },
    },
  },
  plugins: [],
  purge: ["./src/**/*.html", "./src/**/*.vue", "./src/**/*.jsx"],
};
