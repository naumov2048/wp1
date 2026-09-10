<?php

add_action('wp_enqueue_scripts', 'childhood_scripts');

function childhood_scripts() {
    wp_enqueue_style('childhood-style', get_template_directory_uri() . '/assets/styles/main.min.css');
    // wp_enqueue_style('animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css');
    wp_enqueue_script('childhood-script', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), null, true);
}

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

?>
