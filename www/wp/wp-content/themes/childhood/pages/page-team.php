<?php
/*
Template Name: Page-Team
*/
?>
<?php get_header(); ?>

<main>
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                    <div class="about__img">
                        <?php
                            $image = get_field('about_image');
                            if (!empty($image)) :
                        ?>
                            <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                    <h1 class="title underlined">
                        <?= get_field('about_title'); ?>
                    </h1>
                    <div class="about__text">
                        <?= get_field('about_description'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="specialists" id="specialists">
        <div class="container">
            <div class="title">
                <?= get_field('team_title'); ?>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <?php
                        $image = get_field('team_image');
                        if (!empty($image)) {
                    ?>
                        <img class="specialists__img" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                    <?php 
                        }
                    ?>
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
