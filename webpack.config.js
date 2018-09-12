var path = require( 'path' );
var UglifyJSPlugin = require( 'uglifyjs-webpack-plugin' );

module.exports = {
    entry: [ './dev/js/app.js' ],
    output: {
        filename: 'app.min.js',
        path: path.resolve( __dirname, 'assets/js' )
    },
//    devtool: "cheap-eval-source-map",
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /(node_modules)/,
            use: [ {
                loader: 'babel-loader',
                options: {
                    presets: [ [ 'es2015', { modules: false } ] ]
                }
            } ]
        }]
    },
    externals: {
      jquery: 'jQuery',
    },
    plugins: [
        new UglifyJSPlugin()
    ]
};
