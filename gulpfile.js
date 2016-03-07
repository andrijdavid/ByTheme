var gulp = require('gulp');
var nano = require('gulp-cssnano');
var uglify = require('gulp-uglify');
var del = require('del');
var sass = require('gulp-sass');
var If = require('gulp-if');
var concat = require('gulp-concat');
var fs = require('fs');
var watch = require('gulp-watch');
var strip = require('gulp-strip-css-comments');

var paths = {
    scripts: 'resources/assets/src/js/**/*.js',
    style: 'resources/assets/src/sass/**/*.scss'
};

var scripts = [
    'resources/assets/src/vendor/jquery/dist/jquery.js',
    'resources/assets/src/vendor/bootstrap-sass/assets/javascripts/bootstrap.js',
    'resources/assets/src/vendor/wow/dist/wow.js',
    'resources/assets/src/js/helpers.js',
    'resources/assets/src/js/init.js'
];

gulp.task('style', ['galleryCSS', 'cleanStyle'], function () {
    return gulp.src('resources/assets/src/sass/style.scss')
        .pipe(sass())
       // .pipe(nano())
        // .pipe(strip())
        .pipe(gulp.dest('resources/assets/css/'));
});

gulp.task('script', ['galleryJS', 'cleanScript'], function () {
    return gulp.src(scripts)
        .pipe(concat('script.js'))
     // .pipe(uglify())
        .pipe(gulp.dest('resources/assets/js/'));
});

gulp.task('galleryJS', ['cleanScript'], function(){
    return gulp.src([
             'resources/assets/src/vendor/eventie/eventie.js',
             'resources/assets/src/vendor/masonry/dist/masonry.pkgd.min.js',
             'resources/assets/src/vendor/photoswipe/dist/photoswipe.min.js',
             'resources/assets/src/vendor/photoswipe/dist/photoswipe-ui-default.min.js'
        ])
        .pipe(concat('gallery.js'))
        //.pipe(uglify())
        .pipe(gulp.dest('resources/assets/js/'));
});

gulp.task('galleryCSS', ['cleanStyle'], function(){
    return gulp.src([
            'resources/assets/src/vendor/photoswipe/dist/photoswipe.css'
        ])
        .pipe(concat('gallery.css'))
        //.pipe(nano())
        //.pipe(strip())
        .pipe(gulp.dest('resources/assets/css/'));
});


gulp.task('watch', function () {
    gulp.watch(paths.style, ['style']);
    gulp.watch(paths.scripts, ['script']);
});

gulp.task('copy', ['cleanStyle', 'cleanScript'], function () {
    gulp.src([
        'resources/assets/src/vendor/bootstrap-sass/assets/fonts/**/*',
        'resources/assets/src/vendor/font-awesome/fonts/**/*'

    ]).pipe(gulp.dest('resources/assets/font'));

    gulp.src([
        'resources/assets/src/vendor/bootstrap-sass/assets/fonts/**/*',
        'resources/assets/src/vendor/font-awesome/fonts/**/*'

    ]).pipe(gulp.dest('resources/assets/fonts'));

    gulp.src([
        'resources/assets/src/vendor/masonry/dist/masonry.pkgd.min.js',
        'resources/assets/src/js/admin.js',
        'resources/assets/src/vendor/flickity/dist/flickity.pkgd.min.js',
        'resources/assets/src/vendor/eventie/eventie.js',
        'resources/assets/src/vendor/imagesloaded/imagesloaded.pkgd.min.js'
    ]).pipe(gulp.dest('resources/assets/js'));

    gulp.src([
        'resources/assets/src/vendor/flickity/dist/flickity.min.css'
    ]).pipe(gulp.dest('resources/assets/css'));

    return gulp.src([
        'resources/assets/src/vendor/Materialize/dist/font/**/*',
        'resources/assets/src/vendor/font-awesome/fonts/**/*'

    ]).pipe(gulp.dest('resources/assets/fonts'));

});

gulp.task('cleanScript', function () {
    return del([
        'resources/assets/js/**/*'
    ], {
         force: true
    });
});

gulp.task('cleanStyle', function () {
    return del([
        'resources/assets/css/**/*'
    ], {
        force: true
    });
});

gulp.task('build', ['style', 'script', 'galleryJS', 'galleryCSS']);

gulp.task('clean', ['cleanStyle', 'cleanScript']);

gulp.task('default', ['clean', 'build', 'copy']);


