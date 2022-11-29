const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                'acsensor-grey': '#f0f0f0',
                'acsensor-green': '#7d805f',
                'acsensor-dark-grey': '#323232',
                'acsensor-black': '#262626',
                'acensor-orange': '#e4895d'
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'hero': "url(public/img/hero.jpg)"
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
