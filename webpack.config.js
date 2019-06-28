const path = require('path');
const CopyPlugin = require('copy-webpack-plugin');



//chargement des plugins dans une constante
const MiniCSSExtractPlugin = require('mini-css-extract-plugin');
//qd le js est sur une seule ligne = mode production. Ici on passe en mode dev 
const devMode = process.env.MODE_ENV !== 'production';

module.exports = {
  entry: './assets/js/app.js',
  output: {
    path: path.resolve(__dirname, 'public/js'),
    filename: 'script.js'
  },

  //ici c le sass style loader
  module : {
    rules : [{
      //verification de TOUS les fichiers css
      test:/\.s?[ac]ss$/,
      use : [
        MiniCSSExtractPlugin.loader,
        
        {loader: 'css-loader', options: {url:false, sourceMap : true}},
          
        {loader: 'sass-loader', options: {sourceMap: true}}
        
        
      ]
    },
    { //configuration de babel
      test: /\.js$/,
      exclude: /node_modules/,
      use:"babel-loader"
    },

    
  ]
  },
  devtool : 'source-map',
  plugins:[
    new MiniCSSExtractPlugin({
      filename: '../css/style.css'
    }),

    new CopyPlugin([
      { from: './assets/images', to: '../img' },
    ]),

  ],
  mode : devMode ? 'development' : 'production'
};