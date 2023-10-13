import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    build: { chunkSizeWarningLimit: 1600, },
    plugins: [
        laravel([
            'resources/js/app.js',
            'resources/css/styles.css',
            'resources/css/app.css',
            'resources/js/scripts.js'
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
