import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/shop.css',
                'resources/js/app.js',
                'resources/js/shop.jsx'
            ],
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        extensions: ['.js', '.jsx', '.ts', '.tsx']
    }
});
