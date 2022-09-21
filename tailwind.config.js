const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
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
            black: '#000000',
            white: '#ffffff',
            primary: '#36393f',
            primaryLight: '#CFD8DC',
            purple: '#1d1f22',
            orange: '#FFB74D',
            orangeLight: '#FFE9CA',
            fundo: "#383646",
            perfil:"#B5B2BF",
            pop: "#3C3945",
            postbotao: "#3C3945",
            Card: "#777382",
            qrCode: "#383646"
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
