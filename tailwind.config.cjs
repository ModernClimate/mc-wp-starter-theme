/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.{html,php}', './assets/**/*.{js,ts,jsx,tsx,vue}'],
  theme: {
    // https://tailwindcss.com/docs/screens
    // https://tailwindcss.com/docs/responsive-design
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px',
    },
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    extend: {},
    // fontFamily: {
    //   'sans-serif': ['Montserrat', 'sans-serif'],
    //   serif: ['ui-serif', 'Georgia', 'serif'],
    //   mono: ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', 'Liberation Mono', 'Courier New', 'monospace'],
    // },
  },
  plugins: [],
};
