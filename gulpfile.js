const gulp = require('gulp')
const sass = require('gulp-sass')
const notify = require('gulp-notify')
const sourcemaps = require('gulp-sourcemaps')
const autoprefixer = require('gulp-autoprefixer')
const svgSprite = require('gulp-svg-sprite')
const svgmin = require('gulp-svgmin')
const size = require('gulp-size')
const browserSync = require('browser-sync')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const babel = require('gulp-babel')
const del = require('del')
const rename = require('gulp-rename')

////////////////////////////////////////////////////////////////////////////////
// Path Configs
////////////////////////////////////////////////////////////////////////////////

const paths = {
  sassPath: 'assets/sass/',
  nodePath: 'node_modules/',
  jsPath: 'assets/js/',
  destPath: '_dist/',
  foundationJSpath: 'node_modules/foundation-sites/dist/js/plugins/',
  imgPath: 'assets/img/'
}

////////////////////////////////////////////////////////////////////////////////
// CSS
////////////////////////////////////////////////////////////////////////////////

gulp.task('css', function () {
  gulp.src(paths.sassPath + 'app.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'})
      .on('error', notify.onError(error => `Error: ${error.message}`))
    )
    .pipe(autoprefixer({browsers: ['last 2 versions']}))
    .pipe(sourcemaps.write('.'))
    .pipe(size({showFiles: true}))
    .pipe(gulp.dest(paths.destPath + 'css'))
    .pipe(browserSync.stream({match: '**/*.css'}))
})

////////////////////////////////////////////////////////////////////////////////
// JS
////////////////////////////////////////////////////////////////////////////////

gulp.task('js', function () {
  return gulp.src([
    // Our custom JS
    paths.jsPath + '/*.js'
  ])
    .pipe(babel({
      presets: [
        ['env', {
          targets: {
            browsers: ['last 2 versions', 'ie >= 10']
          }
        }]
      ]
    }))
    .pipe(concat('app.js'))
    .pipe(gulp.dest(paths.destPath + 'js'))
    .pipe(uglify().on('error', notify.onError(error => `Error: ${error.message}`)))
    .pipe(rename('app.min.js'))
    .pipe(gulp.dest(paths.destPath + 'js'))
    .pipe(size({showFiles: true}))
})

////////////////////////////////////////////////////////////////////////////////
// IMages
////////////////////////////////////////////////////////////////////////////////

gulp.task('img', function () {
  return gulp.src([
    // Our custom JS
    paths.imgPath + '/*.*'
  ])
    .pipe(gulp.dest(paths.destPath + 'img'))
})

////////////////////////////////////////////////////////////////////////////////
// DEPLOY on local dev env
////////////////////////////////////////////////////////////////////////////////

gulp.task('deploy', function() {

  var files = [
    '_dist/**/*', 
    'page-templates/**/*',
    'template-parts/**/*',
    'src/**/*',
    'screenshot.png',
    '*.php',
    '*.css'];

  var destPath = '/Applications/MAMP/local.cfsj/wp-content/themes/austeve-heisenberg-child';

  return gulp.src(files, {base:"."})
        .pipe(gulp.dest(destPath))
        .pipe(notify({
        message: "✔︎ Deploy task complete",
        onLast: true
      }));
});

////////////////////////////////////////////////////////////////////////////////
// CLEAN on local dev env
////////////////////////////////////////////////////////////////////////////////

gulp.task('clean', function() {

  var destPath = '/Applications/MAMP/local.cfsj/wp-content/themes/austeve-heisenberg-child';

  return del([
      destPath
      ], {force: true});

});

// Full gulp build, mainly used in deployment scripts
gulp.task('build', ['css', 'js', 'deploy'])
