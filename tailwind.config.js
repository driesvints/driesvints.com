const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  theme: {
    extend: {
      borderWidth: {
        '6': '6px',
      },
      colors: {
        primary: '#8065ee',
        secondary: '#5845d0',
      },
      fontFamily: {
        sans: [
          'Muli',
          ...defaultTheme.fontFamily.sans,
        ]
      },
    },
    backgroundColor: theme => ({
      ...theme('colors'),
      'black-opacity-40': 'rgba(0, 0, 0, 0.4)',
    }),
    textShadow: {
      'default': '0 2px 5px rgba(0, 0, 0, 0.5)',
      'lg': '0 2px 10px rgba(0, 0, 0, 0.5)',
      'none': 'none',
    },
  },
  variants: {
    textShadow: ['responsive'],
  },
  plugins: [],
};
