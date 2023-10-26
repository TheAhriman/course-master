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
            'resources/js/scripts.js',
            'resources/css/style-form.css',
            'resources/css/footer.css',
            'resources/css/header.css',
            'resources/css/index.css',
            'resources/css/main-side-bar-menu.css',
            'resources/js/drop-down-language.js',
            'resources/css/about-course.css'
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
