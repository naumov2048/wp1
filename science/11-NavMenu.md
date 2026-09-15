# Adding navigation menu

1. Enable menu capability in theme - file `functions.php`
```
function my_theme_setup() {
    ...
    add_theme_support( 'menus' );
}
```

2. In wp-admin, go to theme customization

3. Add new menu 'Main', add there our pages and save changes.

4. In `header.php`, replace static menu with this:
```
<nav class="row" data-slide="1">
    <?php
        wp_nav_menu([
            'menu' => 'Main',
            'echo' => true,
            'container' => false,
            'menu_class' => 'header__nav',
            'items_wrap' => '<ul class="header__nav">%3$s</a>',
            'depth' => 0,
            'walker' => '',
        ])
    ?>
</nav>
```

5. Now, menu can be displayed, but styles are rather missing, because wp_nav_menu() has no way to customize link item. Add this to `functions.php`:
```
add_filter('nav_menu_link_attributes' , 'filter_link_attributes' , 10 , 3);
function filter_link_attributes($attrs, $item, $args) {
    if ($args->menu == 'Main') {
        $attrs['class'] = 'header__nav-item';
    }
    return $attrs;
}
```
