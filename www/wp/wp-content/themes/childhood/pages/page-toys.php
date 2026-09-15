<?php
/*
Template Name: Page-Toys
*/
?>

<?php get_header(); ?>

<main>
    <div class="toys">
        <div class="container">
            <h1 class="title">
                Игрушки
            </h1>
        </div>
        <div class="container">
            <h2 class="subtitle">Мягкие игрушки</h2>
            <div class="toys__wrapper">
                <?php
                    $posts_soft_toys = get_posts([
                        'numberposts' => 30,
                        'category_name' => 'soft_toys',
                        'post_status' => 'publish',
                        'order' => 'ASC'
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

            <h2 class="subtitle">Развивающие игрушки</h2>
            <div class="toys__wrapper">
                <?php
                    $posts_learning_toys = get_posts([
                        'numberposts' => 30,
                        'category_name' => 'learning_toys',
                        'post_status' => 'publish',
                        'order' => 'ASC'
                    ]);
                    foreach ($posts_learning_toys as $i => $item) :
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
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="toys__alert">
                        <?= get_field('story_subtitle') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="question">
        <div class="question__text">
            Есть вопросы? Напишите нам!
        </div>
        <div id="reply" class="minibutton">Написать</div>
        <div class="question__close">&times</div>
    </div>
    
    <div class="reply">
        <div class="reply__body">
            <div class="reply__title">
                Оставьте ваш вопрос здесь
            </div>
            <?= do_shortcode('[contact-form-7 id="9f3d7d7" title="Contact form 2"]') ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
