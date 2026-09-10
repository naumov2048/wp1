# More hooks

1. Added some custom hooks to `functions.php`
```
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
```


2. Called them from `index.php`
```
<?php do_action('my_hook'); ?>

<?php do_action('my_greeting', 'day', 'Steve'); ?>

<?php do_action('my_greeting', 'morning', 'John Apple'); ?>

<p>
    <?= apply_filters('my_goodbye', 'John Apple'); ?>
</p>
<p>
    <?= apply_filters('some_nonexisting_filter', 'Params for nonexisting filter') ?>
</p>
```

3. Result at the bottom of page in browser
```
Hello world 1

Hello world 2

Good day, Steve

Good morning, John Apple

Goodbye, John Apple!

Params for nonexisting filter
```

4. Summary
    - Hook is essentially an event handler.
    - There can be many different functions attached to one hook name.
    - By default, if you add one function twice to one hook, it'll run only once for one hook invocation.
    - Filter is the similar to hook, but it returns a value, and filters can be chained.
    - Filters can be added one function many times to one hook, but only if priority (3rd param) is used.
    - If there are no functions attached to a hook name, it'll return the input value. 
