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
        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
          },
        extend: {
            rotate: {
                '0': '0deg',
              },
            transitionDuration: {
                '700': '700ms',
                '500': '500ms',
              },
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
