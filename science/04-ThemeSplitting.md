# Theme splitting

1. We have a big index.php file in theme folder `www/wp/wp-content/themes/childhood`

2. Put header stuff into `header.php`

3. Put footer stuff into `footer.php`

4. In `index.php` there should be something like this:
```
<?php get_header(); ?>

<main>
    <div>
        ...
    </div>
    ...
</main>

<?php get_footer(); ?>
```