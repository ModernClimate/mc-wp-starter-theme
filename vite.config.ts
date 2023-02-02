import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        ['theme-scripts']: './assets/scripts/theme-scripts.ts',
        ['admin-scripts']: './assets/scripts/admin-scripts.ts',
        ['theme-styles']: './assets/styles/theme-styles.scss',
        ['editor-styles']: './assets/styles/editor-styles.scss',
      },
      output: {
        dir: './build',
        entryFileNames: () => {
          return `scripts/[name].min.js`;
        },
        assetFileNames: () => {
          return `styles/[name].min.[ext]`;
        },
      },
    },
    sourcemap: true,
  },
  plugins: [],
  resolve: {
    alias: {
      'uikit-util': 'uikit/src/js/util',
    },
  },
});
