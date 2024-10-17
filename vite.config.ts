import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import tailwindcss from 'tailwindcss';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/ts/app.ts'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    css: {
        postcss: {
          plugins: [tailwindcss()],
        },
    },
    resolve: {
        alias: {
            '@': '/resources/ts',
            '@drilling': '/resources/ts/entities/Drilling',
            '@drilling-type': '/resources/ts/entities/DrillingType',
            '@drilling-position': '/resources/ts/entities/DrillingPosition',
            '@excavator': '/resources/ts/entities/Excavator',
            '@excavator-type': '/resources/ts/entities/ExcavatorType',
            '@career': '/resources/ts/entities/Career',
            '@horizon': '/resources/ts/entities/Horizon',
            '@truck-type': '/resources/ts/entities/TruckType',
            '@truck': '/resources/ts/entities/Truck',
            '@movement': '/resources/ts/entities/Movement',
            '@modules': '/resources/ts/modules',
            '@excavator-fact': '/resources/ts/entities/ExcavatorFact',
            '@explosion': '/resources/ts/entities/Explosion',
            '@excavator-position': '/resources/ts/entities/ExcavatorPosition'
        },
        
    },
});
