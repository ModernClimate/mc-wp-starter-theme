# Autoformatting

### Prettier

Autoformats _CSS_, _SCSS_, _PHP_, _JS_, _TS_, and _MD_
**VSCode**

- Install from Code > Preferences > Extensions: [Prettier - Code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)

### ESLint

Finds and fixes problems in JS/TS
**VSCode**

- Install from Code > Preferences > Extensions: [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)

### Format on save [Editor]

**VSCode**
Make sure the following settings are present in `settings.json` to enable prettier to format on save:

```
  "editor.defaultFormatter": "esbenp.prettier-vscode",
  "editor.formatOnSave": true,
  "prettier.requireConfig": true,
  "[javascript]": {
    "editor.tabSize": 2,
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[typescript]": {
    "editor.tabSize": 2,
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[json]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[jsonc]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
```

Note: prettier will only autoformat if there is a `.prettierrc.json` file present. This way you won't autoformat other projects where you wish to not do so.

Note: all other settings can be handled on a project basis in the prettierrc.json, .prettierignore, etc. files
