import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// tambahkan ini
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        //tambahkan ini
        tailwindcss(),
    ],
});
