import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography'; // Useful for rich text
import aspectRatio from '@tailwindcss/aspect-ratio'; // Helps with responsive images

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js', // Include JS files for Alpine.js or custom scripts
        './resources/**/*.vue', // Include Vue components if used
    ],
    darkMode: 'class', // Enables dark mode toggle via a class
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#0D253F', // Deep blue
                secondary: '#FAEBD7', // Cream color
                accent: '#E3F2FD', // Light blue
            },
        },
    },

    plugins: [forms, typography, aspectRatio], 
};
