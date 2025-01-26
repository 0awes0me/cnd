import {fileURLToPath, URL} from 'node:url'
import {defineConfig, loadEnv} from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'
import tailwindcss from '@tailwindcss/vite'


export default defineConfig({

    server: {},
    plugins: [
        vue(),
        tailwindcss(),

        vueDevTools(),
    ],
    resolve: {
        alias: {
            process: "process/browser",
            '@': fileURLToPath(new URL('./src', import.meta.url))
        },
    },
})

