<?php
if(!defined('ABSPATH')) exit();
//To take data from quizboo.js and return a AJAX result
function quizbook_result() {
    if(isset($_POST['data'])) {
        $answers = $_POST['data'];
    }
    $result =0;
    foreach($answers as $ans) {
        $ask = explode(':', $ans);
        /*
        * $ask[0] = ID, $ask[1] = option take it by the user   
        */
        $right_answer = get_post_meta($ask[0], 'q_right', true);
        $right_option = explode(':', $right_answer);
         /*
        * $right_option[0] = q_right, $right_option[1] = right letter   
        */
       
        if(intval($ask[1])  === intval($right_option[1]) ) {
            $result += 20;
        }
    }
    $qualification = array(
        'total' => $result,
        
    );
    header('Content-type: aplication/json');
    echo json_encode($qualification);
    //echo json_encode( $right_option[1]);
    die();
}
add_action( 'wp_ajax_nopriv_quizbook_result', 'quizbook_result' );
add_action('wp_ajax_quizbook_result', 'quizbook_result');