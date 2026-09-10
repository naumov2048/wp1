# Custom logo

1. In file `functions.php` add this to enable custom logo:
```
function my_theme_setup() {
    add_theme_support( 'custom-logo' );
}

add_action( 'after_setup_theme', 'my_theme_setup' );
```

2. In file `header.php` replace this
```
<a href="#" class="header__logo">
    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/svg/logo.svg" alt="Мир детства" class="header__logo-img">
    <div class="header__logo-text">Мир детства</div>
</a>
```
with this
```
<div class="header__logo">
    <?php the_custom_logo(); ?>
</div>
```

3. Upload and choose logo in wordpress admin panel

4. Now you should see your logo in header
