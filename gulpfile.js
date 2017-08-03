var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var pump = require('pump');

var options = {
    mangle: {
        toplevel: true, //Para quitar los nombres de funciones
    }
};
 
gulp.task('compress', function() {
	return gulp.src([	'./public/js/admin.js',
						'./public/js/beneficios.js',
						'./public/js/consulta.js',
						'./public/js/init.js',						
						'./public/js/login.js',
						'./public/js/utilities.js',
						])
		.pipe(concat('app.js'))
		.pipe(gulp.dest('./public/dist/'))
		.pipe(uglify(options))
		.pipe(gulp.dest('./public/dist'));
});