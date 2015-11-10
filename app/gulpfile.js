/*global -$ */
'use strict';
var gulp = require('gulp');
var concat = require('gulp-concat-css');
var concat_global = require('gulp-concat');
var $ = require('gulp-load-plugins')();
var copy = require('gulp-copy');

var paths = {
    vendorJs: [
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/modernizr/modernizr.js',
        'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.min.js',

    ]
};

gulp.task('styles', function () {
    return gulp.src('styles/main.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            outputStyle: 'compressed', // libsass doesn't support expanded yet
            precision: 10,
            includePaths: ['.'],
            onError: console.error.bind(console, 'Sass error:')
        }))
        .pipe($.postcss([
            require('autoprefixer-core')({browsers: ['last 1 version']})
        ]))
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest('../assets/styles'));
});

gulp.task('scripts', function () {
    return gulp.src('javascripts/*.js')
        .pipe($.uglify())
        .pipe(concat_global('app.js'))
        .pipe(gulp.dest('../assets/js'));
});

gulp.task('watch', ['styles','scripts'], function () {
    gulp.watch('styles/**/*.scss', ['styles']);
    gulp.watch('javascripts/*.js', ['scripts']);
    gulp.watch('javascripts/**/*.js', ['scripts']);
});

gulp.task('default', ['clean'], function () {
    gulp.start('build');
});
