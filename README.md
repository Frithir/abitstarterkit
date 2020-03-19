# Abit starterkit

Let's say your theme name is **xyz** and it's located in `wp-content/themes/xyz`.

Compiler will use `wp-content/themes/xyz/dist` as a root for output. All files will be in their respective folders (for example, styles will be in `wp-content/themes/xyz/dist/app.css`).

In bundler root, first, run `yarn install` to install all the dependencies and then run `yarn start` for development environment (Webpack + BrowserSync).
`yarn build` for the production build.

`webpack.config.js`. Change the proxy target to the location of the WordPress site you want BrowserSync to proxy in development mode. `const proxy = 'http://abitstarterkit.localhost';` BrowserSync will create proxy on `localhost:3000` or the first available port after that, if 3000 is taken

⚠ **Requires [Node](https://nodejs.org/en/) 8.5.0 or greater.**
