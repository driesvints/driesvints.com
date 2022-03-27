const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors');

module.exports = {
    content: ['./resources/**/*.blade.php', './resources/**/*.js', './resources/**/*.scss'],
    theme: {
        extend: {
            borderWidth: {
                6: '6px',
            },
            colors: {
                primary: '#8065ee',
                secondary: '#5845d0',
                yellow: colors.amber,
            },
            fontFamily: {
                sans: ['Muli', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                '8xl': '88rem',
            },
        },
        backgroundColor: (theme) => ({
            ...theme('colors'),
            'black-opacity-40': 'rgba(0, 0, 0, 0.4)',
        }),
        textShadow: {
            lg: '0 2px 10px rgba(0, 0, 0, 0.5)',
            none: 'none',
            DEFAULT: '0 2px 5px rgba(0, 0, 0, 0.5)',
        },
    },
};
