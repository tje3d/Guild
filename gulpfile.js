var gulp = require('gulp');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var less = require('gulp-less');
var sourcemaps = require('gulp-sourcemaps');
var include = require("gulp-include");
var purify = require('gulp-purifycss');

// Config
const DEV_PATH = 'resources/assets';
const OUTPUT_PATH = 'public/assets';

// Site
gulp.task('site:scss:watch', function () {
    return gulp.src(DEV_PATH + '/site/scss/entry.scss')
	    .pipe(sourcemaps.init())
	    .pipe(sass().on('error', sass.logError))
	    .pipe(autoprefixer({
	        browsers: ['last 200 versions'],
	        cascade: false
	    }))
	    .pipe(rename('site.css'))
	    .pipe(sourcemaps.write())
	    .pipe(gulp.dest(OUTPUT_PATH + '/site/'));
});

gulp.task('site:scss', function () {
    return gulp.src(DEV_PATH + '/site/scss/entry.scss')
	    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
	    .pipe(autoprefixer({
	        browsers: ['last 200 versions'],
	        cascade: false
	    }))
	    .pipe(rename('site.css'))
	    .pipe(gulp.dest(OUTPUT_PATH + '/site/'));
});

gulp.task('site:js', function () {
    return gulp.src(DEV_PATH + '/site/js/entry.js')
	    .pipe(include())
	    .pipe(uglify({mangle: true, compress: true}))
	    .pipe(rename('site.js'))
	    .pipe(gulp.dest(OUTPUT_PATH + '/site/'));
});

gulp.task('site:js:watch', function () {
    return gulp.src(DEV_PATH + '/site/js/entry.js')
	    .pipe(include())
	    .pipe(rename('site.js'))
	    .pipe(gulp.dest(OUTPUT_PATH + '/site/'));
});

/*
|--------------------------------------------------------------------------
| Watch
|--------------------------------------------------------------------------
*/
gulp.task('watch', function () {
	gulp.watch('./**/*.scss', ['site:scss:watch']);
	gulp.watch(DEV_PATH + '/site/js/**/*.js', ['site:js:watch']);
});

// Purify CSS
gulp.task('purifycss:site', function() {
	let options = {
		minify: true,
		rejected: true
	};

	return gulp.src('./public/assets/site/site.css')
	    .pipe(purify(['./resources/views/layouts/website.blade.php', './resources/views/site/**/*.blade.php', './resources/views/components/**/*.blade.php', './app/Http/Controllers/Website/**/*.php'], options))
	    .pipe(gulp.dest('./public/assets/site'));
});

// Build
gulp.task('build:site', ['site:js', 'site:scss', 'purifycss:site'], function () {
});