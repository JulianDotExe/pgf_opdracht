import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundColor: {
                'blue-700': 'rgb(31, 41, 54)',
                'blue-800': 'your-custom-color-1',
                'blue-900': 'rgb(19, 25, 33)',
              },
              gradientColorStops: {
                'blue-700': 'rgb(31, 41, 54)',
                'blue-800': 'your-custom-color-1',
                'blue-900': 'rgb(19, 25, 33)',
              },
        },
    },

    plugins: [forms],
};
