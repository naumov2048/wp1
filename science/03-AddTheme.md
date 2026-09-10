# Adding custom theme

1. Downloaded childhood.zip from Google drive

2. Unpacked it into www/wp/wp-content/themes. 
   Renamed index.html to index.php and put all top level theme folders into assets folder

3. Added style.css with required theme info

4. Updated permissions (necessary when you can't see your theme in wordpress)
```
chmod -R +755 www/wp/wp-content/themes/childhood
```

5. As in the guide, i activated my custom theme and can see a page without css or images.

6. Adding stuff to index.php in my custom theme
```
<head>
    ...
    <?php
        wp_head();
    ?>
</head>
```

7. Adding wp_footer to index.php
```
    </footer>
    <?php
        wp_footer();
    ?>
</body>
```

8. Adding file functions.php with the following code
```
<?php

add_action('wp_enqueue_scripts', 'childhood_scripts');

function childhood_scripts() {
    wp_enqueue_style('childhood-style', get_template_directory_uri() . '/assets/styles/main.min.css');
    // wp_enqueue_style('animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css');
    wp_enqueue_script('childhood-script', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), null, true);
}

?>
```

9. Replacing image paths in index.php
```
find: ./img
replace: <?= get_template_directory_uri() ?>/assets/img
```


