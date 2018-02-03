'use strict';

var gulp = require('gulp'),
    minifyCSS = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    prefix = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass');

gulp.task('styles', function(){
  return gulp.src('src/scss/app.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(prefix('last 2 versions'))
    .pipe(concat('main.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('dist'))
});
