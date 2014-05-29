var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    cache = require('gulp-cache');

gulp.task('styles', function () {
    return gulp.src('./public/src/styles/styles.scss')
        .pipe(sass({ style: 'compressed' }))
        .pipe(autoprefixer('last 15 versions'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./public/assets/css'));
});

gulp.task('scripts', function() {
    return gulp.src('./public/src/scripts/**/*.js')
        .pipe(concat('script.js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest('./public/assets/js'));
});

gulp.task('images', function() {
  return gulp.src('./public/src/images/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
    .pipe(gulp.dest('./public/assets/images'));
});

gulp.task('clean', function() {
  return gulp.src(['./public/assets/css', './public/assets/js', './public/assets/images'], { read: false })
    .pipe(clean());
});

gulp.task('default', ['clean'], function () {
    gulp.start('styles', 'scripts', 'images');
});

gulp.task('watch', function() {
  // Watch .scss files.
  gulp.watch('./public/src/styles/**/*.scss', ['styles']);

  // Watch .js files.
  gulp.watch('./public/src/scripts/**/*.js', ['scripts']);

  // Watch image files.
  gulp.watch('./public/src/images/**/*', ['images']);
});
