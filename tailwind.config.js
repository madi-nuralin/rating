const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                //sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // gray: colors.blueGray,
                teal: colors.teal,
                emerald: colors.emerald,
                orange: colors.orange,
                sky: colors.sky,
                slate: colors.slate
            },
            listStyleType: {
                none: 'none',
                disc: 'disc',
                decimal: 'decimal',
                square: 'square',
                roman: 'upper-roman'
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            display: ['dark']
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp')
    ],
    
    darkMode: 'class',
};
