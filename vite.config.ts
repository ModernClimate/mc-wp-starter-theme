import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        ['theme-scripts']: './assets/scripts/theme-scripts.js',
        ['admin-scripts']: './assets/scripts/admin-scripts.js',
        ['theme-styles']: './assets/styles/theme-styles.scss',
        ['editor-styles']: './assets/styles/editor-styles.scss',
      },
      output: {
        dir: './build',
        entryFileNames: () => {
          return `scripts/[name].min.js`;
        },
        assetFileNames: (asset) => {
          const fontExtensions = ['.ttf', '.woff', '.woff2', '.eot'];
          const isFont = fontExtensions.some((ext) => {
            return asset.name?.endsWith(ext);
          });
          if (isFont) {
            return 'styles/fonts/[name].[ext]';
          }

          const imageExtensions = ['.jpg', '.jpeg', '.png', '.gif', '.svg'];
          const isImage = imageExtensions.some((ext) => {
            return asset.name?.endsWith(ext);
          });
          if (isImage) {
            return 'styles/images/[name].[ext]';
          }

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
  base: '',
});
