<?php
if(!defined('ABSPATH')) exit();
//Create a Shortcode, use [quizbook questions="" order=""]
function quizbook_shortcodes($atts) { 
    $args = array(
        'post_type' => 'quizbook_Quizzes',
        'posts_per_page' => $atts['questions'],
        'orderby' => $atts['order'], 
    );
    $quizbook = new WP_Query($args);
    ?>
<form name="quizbook_send" id="quizbook_send">
    <div class="quizbook" id="quizbook">
        <ul>
            <?php while($quizbook->have_posts()): $quizbook->the_post(); ?>
            <li data-questions="<?php echo get_the_ID(); ?>">
                <?php the_title('<h2>', '</h2>'); ?>
                <?php the_content('<p>', '</p>'); ?>
                <?php 
                            $options = get_post_meta(get_the_ID());
                            foreach($options as $key => $option) {
                                $result = quizbook_filter($key);
                                if($result === 0) { 
                                    $number = explode('_', $key);
                                    ?>
                <div id="<?php echo get_the_ID() . ': ' . $number[2]; ?>" class="option">
                    <h3><?php echo $option[0]; ?></h3>
                </div>
                <?php }
                            }
                        ?>

            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <input type="submit" value="Send" id="quizbook_submit">
    <div id="quiz_result"></div>
</form>

<?php }
add_shortcode( 'quizbook', 'quizbook_shortcodes' );