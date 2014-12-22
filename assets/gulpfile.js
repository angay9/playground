var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minifyCss = require('gulp-minify-css');

gulp.task('css', function () {
	gulp.src('../public/sass/main.scss')
		.pipe(sass())
		.pipe(minifyCss())
		.pipe(gulp.dest('../public/css'));
});

gulp.task('watch', function (){
	gulp.watch('../public/sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);