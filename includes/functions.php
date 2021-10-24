<?php
if(!defined('ABSPATH')) exit();
function quizbook_filter($key) {
    return strpos($key, 'qb_');
}