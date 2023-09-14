/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  theme: {
    extend: {
      boxShadow: {
        "4xl": "0 0 0 500vmax rgb(0 0 0 / 0.5)",
      },
    },
  },
  plugins: [],
};
