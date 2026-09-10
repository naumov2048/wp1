<?php

add_action('wp_enqueue_scripts', 'childhood_scripts');

function childhood_scripts() {
    wp_enqueue_style('childhood-style', get_template_directory_uri() . '/assets/styles/main.min.css');
    // wp_enqueue_style('animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css');
    wp_enqueue_script('childhood-script', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), null, true);
}

?>
