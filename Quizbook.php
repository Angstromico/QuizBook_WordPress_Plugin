<?php 
/*
Plugin Name: Quiz Book
Plugin URI:
Description: A plugin made to add questions to your site in Wordpress, quick questions, form type.
Version: 1.0.0
Author: Manuel Esteban Morales Zuarez
Author URI: https://wordpress.com/home/manuelmoraleswebdesigner.wordpress.com
license: GPL2
license URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: quizbook
*/
if(!defined('ABSPATH')) exit();

//Call the Post Type
require_once plugin_dir_path( __FILE__ ) . 'includes/posttypes.php';
//Regenerate the URLS WHen Plugin is Active
register_activation_hook( __FILE__, 'quiz_rewrite_flush' );
//Call Metaboxes
require_once plugin_dir_path( __FILE__ ) . 'includes/metaboxes.php';
//Add Roles and Capabilities on the activation and deactivation of the plugin
require_once plugin_dir_path( __FILE__ ) . 'includes/roles.php';
register_activation_hook( __FILE__, 'quizbook_create_role' );
register_deactivation_hook( __FILE__, 'quizbook_remove_role' );
register_activation_hook( __FILE__, 'quizbook_add_capabilities' );
register_deactivation_hook( __FILE__, 'quizbook_remove_capabilities' );
//Add a Shortcode
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcode.php';
//Add Functions
require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';
//CSS and JavaScript
require_once plugin_dir_path( __FILE__ ) . 'includes/scripts.php';
//Results f the Quiz Form 
require_once plugin_dir_path( __FILE__ ) . 'includes/results.php';