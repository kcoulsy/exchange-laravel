import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/filament.css",
                "resources/js/app.js",
                "resources/js/alpine-standard.js",
                "resources/js/alpine-filament.js",
            ],
            refresh: [
                ...refreshPaths,
                "app/Http/Livewire/**",
                "app/Tables/Columns/**",
                "app/Forms/Components/**",
            ],
        }),
    ],
});
