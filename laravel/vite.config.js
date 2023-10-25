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
            'resources/css/about-course.css',
            'resources/css/course.css',
            'resources/css/course-constuctor.css',
            'resources/css/course-content.css',
            'resources/css/footer.css',
            'resources/css/header.css',
            'resources/css/index.css',
            'resources/css/main-side-bar-menu.css',
            'resources/css/page-all-course.css',
            'resources/css/profile.css',
            'resources/css/profile-edit.css.css',
            'resources/js/components/drop-down-language.js',
            'resources/js/components/img-dowland.js',
            'resources/js/components/select-bar.js',
            'resources/js/components/side-bar-menu.js'
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
