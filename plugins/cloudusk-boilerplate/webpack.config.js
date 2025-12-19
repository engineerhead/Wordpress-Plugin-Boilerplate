const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');
const { merge } = require('webpack-merge');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')

const newConfig = {
    entry: {
        main: path.resolve(process.cwd(), 'admin/src', 'index.tsx'),
    },
    output: {
        filename: '[name].js',
        path: path.resolve(process.cwd(), 'admin/build'),
    },
    plugins: [
        ...defaultConfig.plugins,
        new BrowserSyncPlugin({
            open: false,
            port: 3000,
            proxy: "http://nginx",
        }),
    ]

};

module.exports = merge(defaultConfig, newConfig);
