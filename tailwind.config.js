const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors:{
            
            maideRed:'#f92a30',
            maidePink:'#f64d8d',
            maideYellow:'#fde070',
            maideLiblue:'#4becdb',
            maideBlue:'#308cd9',

        },
    },

    plugins: [require('@tailwindcss/forms')],
};
