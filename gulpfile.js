// include gulp
var gulp = require('gulp');

// include imagemin plugins
var changed		= require('gulp-changed');
var imagemin	= require('gulp-imagemin');

// include js plugins
var concat			= require('gulp-concat');
var stripDebug	= require('gulp-strip-debug');
var uglify			= require('gulp-uglify');

// include css plugins
var sass				= require('gulp-sass');
var autoprefix	= require('gulp-autoprefixer');
var minifyCSS		= require('gulp-minify-css');

// minify new images
gulp.task('imagemin', function() {
	var imageSource	= './public/src/images/**/*',
			imageBuild	= './public/images';

	gulp.src(imageSource)
		.pipe(changed(imageBuild))
		.pipe(imagemin())
		.pipe(gulp.dest(imageBuild));
});

// JS concat, strip debugging and minify
gulp.task('scripts', function() {
	gulp.src(['./public/src/js/**/*.js'])
		// .pipe(stripDebug())
		// .pipe(uglify())
		.pipe(gulp.dest('./public/js/'));
});

// CSS concat, auto-prefix and minify
gulp.task('styles', function() {
	gulp.src('./public/src/scss/*.scss')
		.pipe(sass())
		.pipe(autoprefix('last 2 versions'))
		.pipe(minifyCSS())
		.pipe(gulp.dest('./public/css/'));
});

// default gulp task
gulp.task('default', ['imagemin', 'scripts', 'styles'], function() {
	// watch for JS changes
	gulp.watch('./public/src/js/**/*.js', function() {
		gulp.run('scripts');
	});

	// watch for CSS changes
	gulp.watch('./public/src/scss/*.scss', function() {
		gulp.run('styles');
	});
});