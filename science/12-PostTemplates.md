# Templates for posts

In [10-Pages.md](./10-Pages.md), we already learned how to make page templates and put it in pages folder.

Now we want to create template for single post. By convention it should be named single.php and put in theme root folder.

What if we want to keep our stuff in pages? There is a dumb workaround: make single.php in root folder with this:
```
<?php
get_template_part('pages/single');
?>
```

And then write main stuff in pages/single.php:
```
<?php get_header(); ?>

<main>
    <h2 class="subtitle">
        <?php the_title(); ?>
    </h2>
    <div style="min-height: 90vh; margin: 40px auto;">
        <?php 
            $post_content = get_the_content();
            if (strlen($post_content) > 0) {
                echo $post_content;
            } else {
                echo '<p style="text-align:center;">This post has no content yet.</p>';
            }
        ?>
    </div>
    ...
</main>

...
```
