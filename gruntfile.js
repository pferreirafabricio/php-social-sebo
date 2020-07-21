module.exports = function (grunt) {
  grunt.initConfig({
    uglify: {
      files: {
        src: 'public/assets/js/src/*.js',
        dest: 'public/assets/js/min/',
        expand: true,
        flatten: true,
        ext: '.min.js',
      },
    },
    watch: {
      js: {
        files: 'public/assets/js/src/*.js',
        tasks: ['uglify'],
      },
    },
  });

  grunt.loadNpmTaks('grunt-contrib-watch');
  grunt.loadNpmTaks('grunt-contrib-uglify');

  grunt.registerTask('default', [
    'uglify',
  ]);
};
