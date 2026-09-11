# Custom Fields

1. Installed `advanced custom fields` plugin.
Can be installed from admin panel or directly downloaded 
from [https://wordpress.org/plugins/advanced-custom-fields/](https://wordpress.org/plugins/advanced-custom-fields/)

2. Activated the plugin

3. See 'ACF' in left menu

4. Create new field group

5. In that field group, add fields:
    - about_title (text)
    - about_description (textarea)
    - about_image (image, return image url)

6. Go to settings - reading. Set main page (or how is it called) to show Sample page instead of Posts.

7. Go to pages. Edit Sample page, remove all text blocks (they are useless), fill our custom fields.

8. In our theme's `index.php`, replace static stuff with fields
```
<div class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                <div class="about__img">
                    <img src="<?= get_field('about_image') ?>" alt="про компанию">
                </div>
            </div>
            <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                <h1 class="title underlined">
                    <?= get_field('about_title') ?>
                </h1>
                <div class="about__text">
                    <?= get_field('about_description') ?>
                </div>
                <a href="#" class="button">Узнать больше</a>
            </div>
        </div>
    </div>
</div>
```

9. Add one more field to our custom fields
    - about_image_array (image, return as array)

10. Change code in `index.php` like this to use image as array
```
<div class="about__img">
    <!-- <img src="<?= get_field('about_image') ?>" alt="про компанию"> -->
    <?php
        $image = get_field('about_image_array');
        if (!empty($image)) {
    ?>
        <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
    <?php 
        }
    ?>
</div>
```

11. Doing homework: add fields for (basically everything except categories and posts)
    - email
    - phones (array?)
    - socials (array?)
    - our-story (array of objects?)
    - where to find us
