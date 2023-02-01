import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

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
        entryFileNames: (asset) => {
          console.log('entryFileNames', asset.name);
          return `scripts/[name].min.js`;
        },
        assetFileNames: (asset) => {
          console.log('assetFileNames', asset);
          return `styles/[name].min.[ext]`;
        },
      },
    },
    sourcemap: true,
  },
  plugins: [
    vue({
      template: {
        compilerOptions: {
          // treat all tags with a dash as custom elements
          isCustomElement: (tag) => tag.includes('-'),
        },
      },
    }),
  ],
});
