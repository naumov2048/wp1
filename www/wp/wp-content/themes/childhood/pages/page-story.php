<?php
/*
Template Name: Page-Story
*/
?>

<?php get_header(); ?>

<main>
    <div class="aboutus">
        <div class="container">
            <h1 class="title">
                <?= get_field('story_title') ?>
            </h1>

            <?php
                foreach(get_field('story_items') as $item) {
            ?>
                <div class="row row-alternating">
                    <div class="col-lg-6">
                        <div class="subtitle">
                            <?= $item["story_item_title"] ?>
                        </div>
                        <div class="aboutus__text">
                            <?= $item["story_item_description"] ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img 
                            class="aboutus__img"
                            src="<?= $item["story_item_image"]["url"] ?>"
                            alt="<?= $item["story_item_image"]["alt"] ?>"
                        >
                    </div>
                </div>
            <?php
                }
            ?>
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
