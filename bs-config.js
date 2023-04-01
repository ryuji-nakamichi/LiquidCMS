
/*
 |--------------------------------------------------------------------------
 | Browser-sync config file
 |--------------------------------------------------------------------------
 |
 | For up-to-date information about the options:
 |   http://www.browsersync.io/docs/options/
 |
 | There are more options than you see here, these are just the ones that are
 | set internally. See the website for more info.
 |
 |
 */
module.exports = {
  "files": ["./public_html/*.html","./public_html/**/*.html","./public_html/**/*.css","./public_html/**/*.js"],
  server: {
    baseDir: "public_html",
  },
  "startPath":"index.html",
  "proxy": false,
  "port": 3000,
  "xip": false,
  "notify": true,
  "minify": true,
};