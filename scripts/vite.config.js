import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: 'public', // Dossier racine pour les fichiers publics
  build: {
    outDir: path.resolve(__dirname, '../dist'), // Dossier de sortie des fichiers buildés
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, '../public/index.php'), // Fichier d'entrée principal
      },
    },
  },
  server: {
    open: true, // Ouvre automatiquement le navigateur
    proxy: {
      '/api': {
        target: 'http://localhost:8000', // URL du backend PHP (à adapter selon votre config)
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, ''),
      },
    },
  },
});
