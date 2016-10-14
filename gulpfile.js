var gulp        = require( 'gulp' );
var sass        = require( 'gulp-sass' );
var sass_glob   = require( 'gulp-sass-glob' );
var css_clean   = require( 'gulp-clean-css' );
var css_maps    = require( 'gulp-sourcemaps' );
var env         = require( 'gulp-environments' );

gulp.task(  'sass',
            function() {
                return gulp.src( 'assets/scss/theme.scss' )
                    .pipe( sass_glob() )
                    .pipe( sass().on( 'error', sass.logError ) )
                    .pipe( gulp.dest( 'assets/css' ) );
            } );

gulp.task(  'sass:watch',
            function() {
                gulp.watch( 'assets/scss/theme.scss', [ 'sass', 'minify-css' ] );
            } );

gulp.task(  'sass:admin',
            function() {
                return gulp.src( 'assets/scss/theme-admin.scss' )
                    .pipe( sass_glob() )
                    .pipe( sass().on( 'error', sass.logError ) )
                    .pipe( gulp.dest( 'assets/css' ) );
            } );

gulp.task(  'minify-css',
            function() {
                if ( env.production() ) {
                    return gulp.src( 'assets/css/theme.css' )
                        .pipe( css_clean(
                            {
                                "debug": true,
                                "compatibility": "*",
                                "processImportFrom": ['local']
                            },
                            function( data ) {
                                console.log( 'Processing ' + data.name + ' (Size: ' + data.stats.originalSize + ' before, ' + data.stats.minifiedSize + ' after)' );
                            }
                        ) )
                        .pipe( gulp.dest( 'assets/css' ) );
                } else {
                    return gulp.src( 'assets/css/theme.css' )
                        .pipe( css_maps.init() )
                        .pipe( css_maps.write() )
                        .pipe( gulp.dest( 'assets/css' ) );
                }
            }
        );

gulp.task(  'bootstrap',
            function() {
                return gulp.src( 'assets/vendor/bootstrap-sass/assets/stylesheets/_bootstrap.scss' )
                    .pipe( sass().on( 'error', sass.logError) )
                    /*
                    .pipe( css_maps.init() )
                    .pipe( css_clean(
                        {
                            "debug": true,
                            "compatibility": "*"
                        },
                        function( data ) {
                            console.log( 'Processing ' + data.name + ' (Size: ' + data.stats.originalSize + ' before, ' + data.stats.minifiedSize + ' after)' );
                        }
                    ) )
                    .pipe( css_maps.write() )
                    */
                    .pipe( gulp.dest( 'assets/css/vendor/bootstrap' ) );
            } );

gulp.task(  'default', [ 'sass', 'minify-css' ] );
