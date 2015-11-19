var gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

gulp.task('style', function () {
    return gulp.src([
        'resources/assets/sass/app.scss'
        //'public/packages/**/*.css'
    ])
        .pipe(concat('app.scss'))
        .pipe(sass({outputStyle: "compressed"}))
        .pipe(gulp.dest('public/css/'));
});


gulp.task('copy', function () {
    gulp.src([
        'vendor/bower_components/jquery/dist/jquery.min.js',
        'vendor/bower_components/jquery-ui/jquery-ui.min.js',
        'vendor/bower_components/sass-bootstrap/dist/js/bootstrap.min.js',
    ])
        .pipe(gulp.dest('public/js/'));

    gulp.src([
        'vendor/bower_components/jquery-ui/themes/smoothness/images/*',
        'resources/assets/images/*'
    ])
        .pipe(gulp.dest('public/images/'));

    gulp.src([
        'vendor/bower_components/jquery-ui/themes/base/jquery-ui.min.css',
        'vendor/bower_components/sass-bootstrap/dist/css/bootstrap.min.css',
    ])
        .pipe(gulp.dest('public/css/'));

    return gulp.src([
        'vendor/bower_components/sass-bootstrap/fonts/**/*',
        'vendor/bower_components/components-font-awesome/fonts/**/*',
        'vendor/resources/assets/fonts/**/*'
    ])
        .pipe(gulp.dest('public/fonts/'));

});

gulp.task('script', function () {

    gulp.src([
        'resources/assets/js/notify.js'
    ])
        .pipe(concat('notify.js'))
        .pipe(uglify())
        .pipe(rename('notify.min.js'))
        .pipe(gulp.dest('public/js/'));

    gulp.src([
        'resources/assets/js/main.js'
    ])
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(rename('main.min.js'))
        .pipe(gulp.dest('public/js/'));


    return gulp.src([
        'resources/assets/js/admin.js'
    ])
        .pipe(concat('admin.js'))
        .pipe(uglify())
        .pipe(rename('admin.min.js'))
        .pipe(gulp.dest('public/js/'));

    //return gulp.src([
    //    'resources/assets/js/**/*.js',
    //])
    //    .pipe(concat('app.js'))
    //    .pipe(uglify())
    //    .pipe(rename('app.min.js'))
    //    .pipe(gulp.dest('public/js/'));
});

gulp.task('watch', function () {
    gulp.watch('resources/assets/sass/**/*.scss', ['style']);
    gulp.watch('resources/assets/js/**/*.js', ['script']);
});

gulp.task('default', ['style', 'script', 'copy']);