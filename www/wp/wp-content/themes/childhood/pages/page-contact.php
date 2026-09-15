<?php
/*
Template Name: Page-Contact
*/
?>

<?php get_header(); ?>

<main>
    <div class="contacts">
        <h1 class="title">
            <?= get_field_from_mainpage('where_title'); ?>
        </h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contacts__descr underlined">
                        <?= get_field_from_mainpage('where_description'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="map-google" class="contacts__map">
                        <iframe 
                            src="<?= get_field_from_mainpage('contact_map_embed_src') ?>" 
                            width="540" height="340" style="border:0;" 
                            allowfullscreen="" loading="lazy" 
                            referrerpolicy="strict-origin-when-cross-origin"
                        ></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="title contacts__minititle">Свяжитесь с нами</div>
                    <div class="contacts__info">
                        <div class="contacts__phones">
                            <?php
                                foreach (get_field_from_mainpage('contact_phones') as $i => $phone) :
                            ?>
                                <div class="contacts__phoneblock">
                                    Телефон №<?= $i + 1 ?>
                                    <div class="contacts__phonewrap">
                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/svg/phone-2.svg" alt="phone">
                                        <a href="tel:<?= $phone["phone"] ?>"><?= $phone["phone"] ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="contacts__mail">
                            Или напишите нам на почту
                            <a href="mailto:<?= get_field_from_mainpage('contact_email') ?>">
                                <?= get_field_from_mainpage('contact_email') ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title contacts__minititle">Оставьте ваш отзыв</div>
                    <div class="contacts__feed">
                        <?= do_shortcode('[contact-form-7 id="02bc4b8" title="Contact form 1"]') ?>
                    </div>
                </div>
            </div>
            <div class="row mt70">
                <div class="col-lg-8 offset-lg-2">
                    <div class="title">отзывы</div>
                    <div class="feedslider glide">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <?php
                                    $posts_feedbacks = get_posts([
                                        'numberposts' => 6,
                                        'category_name' => 'feedbacks',
                                        'post_status' => 'publish',
                                        'order' => 'ASC'
                                    ]);
                                    foreach ($posts_feedbacks as $i => $item) :
                                ?>
                                    <li class="glide__slide">
                                        <div class="feedslider__title">
                                            <?= get_field('feedback_author', $item->ID) ?>
                                        </div>
                                        <div class="feedslider__text">
                                            <?= get_field('feedback_text', $item->ID) ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

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

