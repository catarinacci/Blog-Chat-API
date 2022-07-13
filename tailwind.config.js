const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
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
                sans: ['Nunito', ],
                sarp: ['Sarpanch' ],
            },
            outlineWidth: {
                5: '5px',
                1: '1px',
                2: '2px',
                4: '4px',
                8: '8px'
              },
              outlineOffset: {
                4: '4px',
              },
            opacity: {
            0: '0',

               25: '.25',

               50: '.5',

               75: '.75',

               10: '.1',

               20: '.2',

               30: '.3',

               40: '.4',

               50: '.5',

               60: '.6',

               70: '.7',

               80: '.8',

               90: '.9',
                100: '1'
              },

        },
    },
    variants: {
        extend: {
            opacity: ['active'],
        },
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
