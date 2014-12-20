var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    cache = require('gulp-cache'),
    del = require('del');

// Compiler tasks
gulp.task('styles', function () {
    return gulp.src('./public/src/styles/styles.scss')
        .pipe(sass({ style: 'compressed', container: './app/storage/tmp' }))
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

// Cleanup tasks
gulp.task('clean:styles', function(cb) {
    del(['public/assets/css/*', '!public/assets/css/.gitignore'], cb);
});
gulp.task('clean:scripts', function(cb) {
    del(['public/assets/js/*', '!public/assets/js/.gitignore'], cb);
});
gulp.task('clean:images', function(cb) {
    del(['public/assets/images/*', '!public/assets/images/.gitignore'], cb);
});

// General tasks
gulp.task('default', function () {
    gulp.start('clean', 'compile');
});

gulp.task('compile', function () {
    gulp.start('styles', 'scripts', 'images');
});

gulp.task('watch', function() {
    gulp.watch('./public/src/styles/**/*.scss', ['styles']);
    gulp.watch('./public/src/scripts/**/*.js', ['scripts']);
    gulp.watch('./public/src/images/**/*', ['images']);
});

gulp.task('clean', function () {
    gulp.start('clean:styles', 'clean:scripts', 'clean:images');
});
