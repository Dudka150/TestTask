import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import './mortgage.js';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/mortgage.js'],
            refresh: true,
        }),
    ],
});
