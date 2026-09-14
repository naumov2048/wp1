# Creating posts

1. Go to wp-admin > posts > categories

2. Create 2 categories so far: slider and soft_toys

3. Go to settings > permalinks

4. Set post url format to custom: `/%category%/%postname%`

5. Install and activate plugin cyr2lat, to automatically convert post slugs from cyrillic to latin. 
Can be downloaded [here](https://wordpress.org/plugins/cyr2lat/) 

6. Create posts in categories slider and soft_toys. So far posts only have title.

7. Use this code in index.php to display posts for example for soft_toys:
```
    <?php
        $posts_soft_toys = get_posts([
            'numberposts' => 30,
            'category_name' => 'soft_toys',
            'post_status' => 'publish'
        ]);
        foreach ($posts_soft_toys as $i => $item) :
    ?>
        <div class="toys__item" style="background-image: url(<?= get_template_directory_uri(); ?>/assets/img/toy_1.jpg)">
            <div class="toys__item-info">
                <div class="toys__item-title">
                    <?= $item->post_title; ?>
                </div>
                ...
            </div>
        </div>
    <?php endforeach; ?>
```

8. IMPORTANT NOTE about get_posts() and foreach: DO NOT USE $post as item variable, because $post is used in WordPress to refer to current post. Declaring own $post in foreach or somewhere else can break your stuff.

8. Go to custom fields, create new field groups: slider and soft_toys

9. In slider field group, configure group to be displayed when post type is equal to slider.

10. In slider field group, add fields: image, title color, button enabled, button url.

11. Go back to posts and fill the field values for slider posts.

12. Display those values in template. IMPORTANT NOTE: in database, posts have 2 fields: ID (uppercase) and id (lowercase). But when posts are retrieved using function get_posts(), only ID (uppercase) is present.
```
<?php
    $posts_slider = get_posts([
        'numberposts' => -1,
        'category_name' => 'slider',
        'post_status' => 'publish',
        'order' => 'ASC'
    ]);
    foreach ($posts_slider as $i => $item) :
?>
    <li style="background-image: url('<?= get_field('slider_image', $item->ID)['url'] ?>')" class="glide__slide">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-1">
                    <h2 class="slider__title" style="color: <?= get_field('slider_title_color', $item->ID) ?>;">
                        <?= $item->post_title ?>
                    </h2>
                    <?php if (get_field('slider_button_enabled', $item->ID)): ?>
                        <a href="<?= get_field('slider_button_url', $item->ID) ?>" class="button">
                            Узнать больше
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        ...
    </li>
<?php endforeach; ?>
```

13. Do the same actions for category learning_toys. After this, we should have sliders, soft toys and learning toys dynamically displayed from posts in our database.

14. Homework of lesson 11: do dynamic display of feedbacks on main page using posts.
Fields:
    - feedback_author text
    - feedback_text textarea
