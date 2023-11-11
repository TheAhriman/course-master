import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/code.jquery.com_jquery-3.7.1.min.js',
                'resources/js/button-more.js',
                'resources/css/favourites.css',
                'resources/css/course-quiz.css',
                'resources/css/courses-chats.css',
                'resources/css/course-chat.css',
                'resources/css/header.css',
                'resources/css/footer.css',
                'resources/css/index.css',
                'resources/js/coments.js',
                'resources/css/course-index.css',
                'resources/css/notifications.css',
                'resources/js/drop-down-exite.js',
                'resources/css/course-quiz-form.css',
                'resources/js/burger-button.js',
                'resources/css/card-course-style.css',
                'resources/css/course-catalog.css',
                'resources/css/course-detailes.css',
                'resources/css/courses.css',
                'resources/css/my-course-progress.css',
                'resources/css/my-courses-statistics.css',
                'resources/css/side-bar-menu.css',
                'resources/css/zero-down.css'
            ],
            refresh: true,
        }),
    ],
});
