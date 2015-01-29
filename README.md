## Digtastic Wordpress

This repo is a start from zero development box for a WordPress installataion. Its configuration resembles the approach taken by [Jason Rhodes](https://github.com/jasonrhodes), for his great [WordPress Hacker's Guide to the Galaxy](https://github.com/jasonrhodes/wphg-project)


## Includes

+ A complete Wordpress 4.1 installation. No files have been modified inside of public/wp-core.
	+ Run `git init` then cd to the public folder 
	+ Enter `git submodule add git://github.com/WordPress/WordPress.git wp-core`
	+ `cd wp-core` and `git checkout 4.1`
+ Composer packages can be installed by running `composer install` (The autoload directive is commented in wordpress.php)
	
	+ phpDocumentor 2.7.0 since 2.8.0 has a bug that outputs an error sayin that there is no summary for the first Docblock of any file
	
	+ Run as `vendor/bin/phpdoc -d ./public/custom -t ./docs`

+ A class for creating new custom post types as explained by Jason Rhodes.
+ A class for creating new taxonomies that are compatible with the custom post types.
+ The bootstrap.php mu-plugin that instantiates these classes has been changed to allow use of singular and plural labels.
+ The bootstrap.php mu-plugin includes a sample block of code that registers a new post type Snippets and Events as well as a new taxonomy Languages that is activated for Snippets and Posts.
+ The functions.php includes two different function declarations to output metadata for a post in different ways

	+ 	To make use of one or another, call the chosen 
		function inside of the loop. It will execute, whenever 
		the post is being rendered, and once for every  post. For 
		example you may place it after the title at content.php

	+ 	To test custom metaboxes, are woeking fine. Activate in 
		the pligins section of the  WP admin panel the one called
		Sample Metabox for Events. Create a New Event, fill in the 
		metaboxes for location and dress code. 
+ Inside the theme assets there is a sass folder. Once Sass and Compass are installed just run `compass watch`
	+	Sass 3.4.9
	+	Compass 1.0.1
	+	To create the config.rb `compass config config.rb`

## Requirements

+ PHP 5.4

## To run in localhost

+ Edit /etc/hosts and add the desired url
+ Edit /etc/apache2/extra/httpd-vhosts.conf add desired ServerName and DocumentRoot up to /public
+ Modify sample_environment to match database settings

### MUST DO
+	There is a problem with the custom taxonomy metabox, it does not assign the taxonomy to the post
	if the taxonomy doesnt exist yet in the combo box.



