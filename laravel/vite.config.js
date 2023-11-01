import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    build: { chunkSizeWarningLimit: 1600, },
    plugins: [
        laravel([
            'resources/js/app.js',
            'resources/js/bootstrap.js',
            'resources/js/js.js',
            'resources/js/scripts.js',
            'resources/css/app.css',
            'resources/css/card-course-style.css',
            'resources/css/course-details.css',
            'resources/css/courses.css',
            'resources/css/my-course-progress.css',
            'resources/css/my-courses.css',
            'resources/css/side-bar-menu.css',
            'resources/css/styles.css',
            'resources/css/zero-down.css',
            'resources/css/course-catalog.css',
            'resources/css/style-form.css'
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
