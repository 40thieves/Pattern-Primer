module.exports = function(grunt) {

	// Project config
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'assets/css/style.css': 'assets/scss/style.scss'
				}
			}
		},

		watch: {
			scripts: {
				files: ['assets/scss/*'],
				tasks: ['sass'],
				options: {
					spawn: false,
					interrupt: true
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['sass', 'watch']);

};