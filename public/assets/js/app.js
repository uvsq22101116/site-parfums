import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: 'public',
  build: {
    outDir: path.resolve(__dirname, '../dist'),
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, '../public/index.php'),
      },
    },
  },
  server: {
    open: true,
    proxy: {
      '/api': {
        target: 'http://localhost:8000',
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, ''),
      },
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "assets/scss/variables.scss";` 
      },
    },
  },
});

  