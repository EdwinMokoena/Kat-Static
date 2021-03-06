const path = require('path');
const {
  CleanWebpackPlugin
} = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require("webpack");
const autoprefixer = require("autoprefixer");

const fontConfig = {
  test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
  use: [{
    loader: 'file-loader',
    options: {
      name: '[name].[ext]',
      outputPath: '/dist/assets/fonts/'
    }
  }]
}

const pugConfig = {
  test: /\.pug$/,
  loader: ['html-loader?attrs=false', 'pug-html-loader']
};

const sassConfig = {
  test: /\.scss$/,
  use: [{
      loader: 'file-loader',
      options: {
        outputPath: (url, resourcePath, context) => {
          return "dist/assets/css/styles.css";
        },
      }
    },
    {
      loader: 'extract-loader'
    },
    {
      loader: 'css-loader?-url'
    },
    {
      loader: 'postcss-loader',
      options: {
        config: {
          path: "./"
        }
      }
    },
    {
      loader: 'sass-loader'
    }
  ]
}

const cssConfig = {
  test: /\.css$/,
  exclude: /node_modules/,
  use: [{
    loader: 'style-loader',
  }, {
    loader: 'css-loader'
  }]
}

const jsConfig = {
  test: /\.js$/,
  loader: "babel-loader",
  exclude: /node_modules/
}

module.exports = env => {
  return {
    devServer: {
      contentBase: path.join(__dirname, 'dist'),
    },
    mode: "development",
    entry: {
      "dist/assets/css/styles.css": "./scss/styles.scss",
    },
    watch: false,
    output: {
      path: env.PROJECT_DIRECTORY + '/',
      filename: './[name].js'
    },
    module: {
      rules: [pugConfig, sassConfig, cssConfig, jsConfig, fontConfig]
    },
    // postcss: function() {
    //   return [autoprefixer];
    // },
    plugins: [
      new CleanWebpackPlugin({
        cleanStaleWepackAssets: true,
        cleanOnceBeforeBuildPatterns: [],
        cleanAfterEveryBuildPatterns: ["**/dist/assets/js/*.js.js", "**/dist/assets/css/*.js", "!node_modules/**"]
      }),
      new webpack.LoaderOptionsPlugin({
        options: {
          postcss: [
            autoprefixer()
          ]
        }
      }),
      new HtmlWebpackPlugin({
        filename: path.resolve(env.PROJECT_DIRECTORY + '/dist/contact.html'),
        template: "./pug/contact.pug",
        inject: false
      }),
      new HtmlWebpackPlugin({
        filename: path.resolve(env.PROJECT_DIRECTORY + '/dist/about.html'),
        template: "./pug/about.pug",
        inject: false
      }),
      new HtmlWebpackPlugin({
        filename: path.resolve(env.PROJECT_DIRECTORY + '/dist/index.html'),
        template: "./pug/index.pug",
        inject: false
      }),
      new HtmlWebpackPlugin({
        filename: path.resolve(env.PROJECT_DIRECTORY + '/dist/service.html'),
        template: "./pug/service.pug",
        inject: false
      }),
      new HtmlWebpackPlugin({
        filename: path.resolve(env.PROJECT_DIRECTORY + '/dist/esg.html'),
        template: "./pug/esg.pug",
        inject: false
      }),
    ]
  }
}
