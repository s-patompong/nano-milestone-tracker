const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                lightBlue: colors.lightBlue
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
