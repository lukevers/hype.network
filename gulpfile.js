var gulp   = require('gulp');
var concat = require('gulp-concat');
var less   = require('gulp-less');

gulp.task('less', function() {
    return gulp.src('resources/assests/less/*.less')
        .pipe(less())
        .pipe(concat('app.css'))
        .pipe(gulp.dest('public/assets/css/'));
}

gulp.task('js', function() {
    return gulp.src('resources/assets/js/*.js')
        .pipe(concat('app.js'))
        .pipe(gulp.dest('public/assets/js/'));
}

gulp.task('default', ['less', 'js']);
