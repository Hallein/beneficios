var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var pump = require('pump');

var options = {
    mangle: {
        toplevel: true, //Para quitar los nombres de funciones
    }
};
 
gulp.task('admin', function() {
	return gulp.src([	'./public/js/admin.js',
						'./public/js/beneficios.js',
						'./public/js/hitos.js',
						'./public/js/usuarios.js',
						'./public/js/init.js',		
						'./public/js/utilities.js',
						])
		.pipe(concat('app-admin.js'))
		.pipe(gulp.dest('./public/dist/'))
		.pipe(uglify(options))
		.pipe(gulp.dest('./public/dist'));
});

gulp.task('consulta', function() {
	return gulp.src([	'./public/js/consulta.js',
						'./public/js/init.js',	
						'./public/js/utilities.js',
						])
		.pipe(concat('app-consulta.js'))
		.pipe(gulp.dest('./public/dist/'))
		.pipe(uglify(options))
		.pipe(gulp.dest('./public/dist'));
});

gulp.task('login', function() {
	return gulp.src([	'./public/js/login.js',
						'./public/js/utilities.js',
						])
		.pipe(concat('app-login.js'))
		.pipe(gulp.dest('./public/dist/'))
		.pipe(uglify(options))
		.pipe(gulp.dest('./public/dist'));
});

gulp.task('default', ['admin', 'consulta', 'login']);