module.exports = function (grunt) {
  grunt.initConfig({
    uglify: {
      files: {
        src: 'views/assets/js/src/*.js',
        dest: 'views/assets/js/min/',
        expand: true,
        flatten: true,
        ext: '.min.js',
      },
    },
    watch: {
      js: {
        files: 'views/assets/js/src/*.js',
        tasks: ['uglify'],
      },
    },
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-uglify-es');

  grunt.registerTask('default', [
    'uglify',
  ]);
};
