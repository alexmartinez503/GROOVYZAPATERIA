import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',

                'public\admin\css\material-dashboard.css',
                'public\admin\js\bootstrap-material-design.min.js',
                'public\admin\js\jquery.min.js',
                'public\admin\js\perfect-scrollbar.jquery.min.js',
                'public\admin\js\popper.min.js',
                'public\admin\css\custom.css',

                'public\frontend\css\custom.css',
                'public\frontend\css\owl.carousel.min.css',
                'public\frontend\css\owl.theme.default.min.css',
                'public\frontend\js\jquery-3.6.0.min.js',
                'public\frontend\js\owl.carousel.min.js',
            ],
            refresh: true,
        }),
    ],
});
