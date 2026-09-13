<?php

function my_theme_setup() {
    add_theme_support( 'custom-logo' );
}

add_action( 'after_setup_theme', 'my_theme_setup' );

function childhood_scripts() {
    wp_enqueue_style('childhood-style', get_template_directory_uri() . '/assets/styles/main.min.css');
    wp_enqueue_style('childhood-style-custom', get_template_directory_uri() . '/assets/styles/custom.css');
    // wp_enqueue_style('animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css');
    wp_enqueue_script('childhood-script', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'childhood_scripts');

function print_hello_1() {
    echo '<p> Hello world 1 </p>';
}

function print_hello_2() {
    echo '<p> Hello world 2 </p>';
}

add_action('my_hook', 'print_hello_1');
add_action('my_hook', 'print_hello_2');
add_action('my_hook', 'print_hello_2');

function print_greeting($time, $name) {
    echo '<p> Good ' . $time . ', ' . $name . ' </p>';
}

add_action('my_greeting', 'print_greeting', 10, 2);

function make_goodbye($name) {
    return 'Goodbye, ' . $name . '!';
}

add_filter('my_goodbye', 'make_goodbye');

function make_hello($name) {
    return 'hello, ' . $name;
}

add_filter('my_hello', 'make_hello', 10);
add_filter('my_hello', 'make_hello', 11);

function get_field_from_mainpage($selector, $post_id = false, $format_value = true, $escape_html = false) {
    $mainpage_id = 2;
    return get_field($selector, $mainpage_id, $format_value, $escape_html);
}

?>
