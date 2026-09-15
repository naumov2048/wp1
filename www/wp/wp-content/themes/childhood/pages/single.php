<?php get_header(); ?>

<main>
    <div class="container toys">
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
        <h2 class="subtitle">
            Возможно вам понравится
        </h2>
        <div style="margin: 40px auto;">
            <div class="toys__wrapper">
                <?php
                    $posts_soft_toys = get_posts([
                        'numberposts' => 30,
                        'category_name' => 'soft_toys',
                        'post_status' => 'publish',
                        'order' => 'DESC'
                    ]);
                    foreach ($posts_soft_toys as $i => $item) :
                ?>
                    <div class="toys__item" style="background-image: url('<?= get_post_thumbnail_url($item->ID, 'medium') ?>')">
                        <div class="toys__item-info toys__item-info-my">
                            <div class="toys__item-title">
                                <?= $item->post_title; ?>
                            </div>
                            <div class="toys__item-descr">
                                <?= get_field('toy_description', $item->ID) ?>                            
                            </div>
                            <?php if (get_field('toy_button_enabled', $item->ID)) : ?>
                                <a href="<?= get_permalink($item) ?>" class="minibutton toys__trigger">
                                    Подробнее    
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
