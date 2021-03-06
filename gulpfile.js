var gulp   = require('gulp');
var concat = require('gulp-concat');
var less   = require('gulp-less');
var minify = require('gulp-minify-css');
var uglify = require('gulp-uglify');

gulp.task('less', function() {
    return gulp.src('resources/assets/less/*.less')
        .pipe(less())
        .pipe(concat('app.css'))
        .pipe(minify())
        .pipe(gulp.dest('public/assets/css/'));
});

gulp.task('js', function() {
    return gulp.src([
            'bower_components/vue/dist/vue.min.js',
            'resources/assets/js/*.js',
        ])
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js/'));
});

gulp.task('watch', function() {
    gulp.watch('resources/assets/less/*.less', ['less']);
    gulp.watch('resources/assets/js/*.js',  ['js']);
});

gulp.task('default', ['less', 'js']);
