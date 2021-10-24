<?php
if(!defined('ABSPATH')) exit();
//CSS and JavaScript to the Fronend
function quizbook_frontend_styles(){
    wp_enqueue_style('quizbookcss', plugins_url('../assets/css/quizbook.css', __FILE__) );
    wp_enqueue_script('quizbookjs', plugins_url('../assets/js/quizbook.js', __FILE__), array('jquery'), 1.0, true );
    wp_localize_script('quizbookjs', 'admin_url', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'quizbook_frontend_styles');
//CSS and JavaScript to the Admin
function quizbook_styles($hook) {

    global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'quizbook_Quizzes' === $post->post_type ) {
            wp_enqueue_style('quizbookcss', plugins_url('../assets/css/admin.css', __FILE__));
        }
    }
}
add_action('admin_enqueue_scripts', 'quizbook_styles', 10, 1);