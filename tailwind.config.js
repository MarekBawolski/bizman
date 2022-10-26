const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.js',
        './resources/**/*.blade.php',
    ],

    theme: {
        extend: {
            boxShadow: {
                'toast': '10px 10px 15px  rgba(0, 0, 0, 0.4)',
              },
            colors: {
                blue: '#3B82F6',
                gray: {
                    DEFAULT: '#556987',
                    dark: '#777777',
                    light: '#D5DAE1'
                },
                yellow: '#F8BB54 ',
                white: '#ffffff',
                "main-gray": "#F7F8F9",

            }, zIndex: {
                modal: 9999,
                1: 1,
                2: 2,
                3: 3,
                4: 4,
                5: 5,
                6: 6,
                7: 7,
                8: 8,
                9: 9,
                "-1": "-1",
                "-2": "-2",
                "-3": "-3",
                "-4": "-4",
                "-5": "-5",
                "-6": "-6",
                "-7": "-7",
                "-8": "-8",
                "-9": "-9",
            },
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        },

        fontFamily: {
            primary: ["Poppins", "sans-serif"]

        },
    },

    plugins: [require('@tailwindcss/forms')],
};
