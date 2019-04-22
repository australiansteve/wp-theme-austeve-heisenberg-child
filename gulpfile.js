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
  destPath: 'assets/_dist/',
  foundationJSpath: 'node_modules/foundation-sites/dist/js/plugins/',
  imgPath: 'assets/img/'
}

////////////////////////////////////////////////////////////////////////////////
// CSS
////////////////////////////////////////////////////////////////////////////////

gulp.task('css', function () {
  return gulp.src(paths.sassPath + 'app.scss')
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
// BUNDLE for deployment to external env
////////////////////////////////////////////////////////////////////////////////

gulp.task('bundle', function() {

  var files = [
    'assets/_dist/**/*', 
    'page-templates/**/*',
    'template-parts/**/*', 
    'screenshot.png',
    '*.php',
    '*.css'];

  var destPath = './_dist/austeve-heisenberg-child';

  return gulp.src(files, {base:"."})
        .pipe(gulp.dest(destPath))
        .pipe(notify({
        message: "✔︎ Bundle task complete",
        onLast: true
      }));
});

// Full gulp build, mainly used in deployment scripts
gulp.task('build', gulp.series( 'css', 'js', 'bundle'));
