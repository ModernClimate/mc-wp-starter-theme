import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        ['theme-scripts']: './assets/scripts/theme.ts',
        ['admin-scripts']: './assets/scripts/admin.ts',
        ['theme-styles']: './assets/styles/theme.scss',
        ['editor-styles']: './assets/styles/editor.scss',
      },
      output: {
        dir: './build',
        entryFileNames: 'scripts/[name].min.js',
        assetFileNames: (asset) => {
          const hasStyleExt = asset.name?.includes('.css') || asset.name?.includes('.scss');
          if (hasStyleExt) {
            return `styles/[name]-styles.min.[ext]`;
          }
          return `[name]-styles.[ext]`;
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
