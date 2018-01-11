module.exports = function(grunt) {

	grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
	        libs: {
		        files: [
					{
						src: [
							'include/script/script.js'
						],
						dest: 'include/script/script.min.js',
					},
					{
						src: [
							'include/script/libs/docReady.js',
							'include/script/script.adjust.js'
						],
						dest: 'include/script/script.adjust.min.js'
					}
				]
			}
        },
		uglify: {
			js: {
				files: [
					{
						src: 'include/script/script.min.js', 
						dest: 'include/script/script.min.js'
					}
				]
			}
		},
		cssmin: {
			css: {
				files: [
					{
						src: 'include/style/screen.css', 
						dest: 'include/style/screen.min.css'
					},
					{
						src: 'include/style/screen_ie.css', 
						dest: 'include/style/screen_ie.min.css'
					}
				]
			}
		}

    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', ['concat', 'cssmin', 'uglify']);

};