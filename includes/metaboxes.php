<?php
if(!defined('ABSPATH')) exit();
function quiz_metaboxes_add() {
    //Add the Metabox to Quizzes
    add_meta_box( 'quizmeta_box_', 'Answers', 'quiz_metaboxes', 'quizbook_Quizzes', 'normal', 'high', null );
}
add_action('add_meta_boxes', 'quiz_metaboxes_add'); 
//Shows the HTML 
function quiz_metaboxes($POST) { 
    wp_nonce_field(basename(__FILE__), 'quizword_nonce');
    ?>
<table class="form table">
    <tr>
        <th class="row-title">
            <h2>Add The Answers Here</h2>
        </th>
    </tr>
    <tr>
        <th class="row-title">
            <label for="answer_2"> a) </label>
        </th>
        <td>
            <input value="<?php echo esc_attr( get_post_meta($POST->ID, 'qb_answer_1', true) ) ?>" type="text"
                id="answer_1" name="qb_answer_1" class="regular-tex">
        </td>
    </tr>
    <tr>
        <th class="row-title">
            <label for="answer_2"> b) </label>
        </th>
        <td>
            <input value="<?php echo esc_attr( get_post_meta($POST->ID, 'qb_answer_2', true) ) ?>" type="text"
                id="answer_2" name="qb_answer_2" class="regular-tex">
        </td>
    </tr>
    <tr>
        <th class="row-title">
            <label for="answer_3"> c) </label>
        </th>
        <td>
            <input value="<?php echo esc_attr( get_post_meta($POST->ID, 'qb_answer_3', true) ) ?>" type="text"
                id="answer_3" name="qb_answer_3" class="regular-tex">
        </td>
    </tr>
    <tr>
        <th class="row-title">
            <label for="answer_4"> d) </label>
        </th>
        <td>
            <input value="<?php echo esc_attr( get_post_meta($POST->ID, 'qb_answer_4', true) ) ?>" type="text"
                id="answer_4" name="qb_answer_4" class="regular-tex">
        </td>
    </tr>
    <tr>
        <th class="row-title">
            <label for="answer_5"> e) </label>
        </th>
        <td>
            <input value="<?php echo esc_attr( get_post_meta($POST->ID, 'qb_answer_5', true) ) ?>" type="text"
                id="answer_5" name="qb_answer_5" class="regular-tex">
        </td>
    </tr>
    <tr>
        <th class="row-title">
            <label for="right_answer"> Right Answer </label>
        </th>
        <td>
            <?php $answer = esc_html( get_post_meta($POST->ID, 'q_right', true) ) ?>
            <select name="q_right" id="right_answer" class="postbox">
                <option value="">Chose the Right One</option>
                <option <?php selected($answer, 'q_right:1'); ?> value="q_right:1">a</option>
                <option <?php selected($answer, 'q_right:2'); ?> value="q_right:2">b</option>
                <option <?php selected($answer, 'q_right:3'); ?> value="q_right:3">c</option>
                <option <?php selected($answer, 'q_right:4'); ?> value="q_right:4">d</option>
                <option <?php selected($answer, 'q_right:5'); ?> value="q_right:5">e</option>
            </select>
        </td>
    </tr>
</table>
<?php
}
function quiz_save_meta_boxes($post_id, $POST, $update) {
    if(!isset($_POST['quizword_nonce']) || !wp_verify_nonce($_POST['quizword_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    if(!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    $answer1 = $answer2 = $answer3= $answer4 = $answer5 = $right = '';
    if(isset($_POST['qb_answer_1'])) {
        $answer1 = sanitize_text_field($_POST['qb_answer_1']);
    }
    update_post_meta($post_id, 'qb_answer_1', $answer1 );
    if(isset($_POST['qb_answer_2'])) {
        $answer2 = sanitize_text_field($_POST['qb_answer_2']);
    }
    update_post_meta($post_id, 'qb_answer_2', $answer2 );
    if(isset($_POST['qb_answer_3'])) {
        $answer3 = sanitize_text_field($_POST['qb_answer_3']);
    }
    update_post_meta($post_id, 'qb_answer_3', $answer3 );
    if(isset($_POST['qb_answer_4'])) {
        $answer4 = sanitize_text_field($_POST['qb_answer_4']);
    }
    update_post_meta($post_id, 'qb_answer_4', $answer4 );
    if(isset($_POST['qb_answer_5'])) {
        $answer5 = sanitize_text_field($_POST['qb_answer_5']);
    }
    update_post_meta($post_id, 'qb_answer_5', $answer5 );
    if(isset($_POST['q_right'])) {
        $right = sanitize_text_field($_POST['q_right']);
    }
    update_post_meta($post_id, 'q_right', $right );
}
add_action( 'save_post', 'quiz_save_meta_boxes', 10, 3 );