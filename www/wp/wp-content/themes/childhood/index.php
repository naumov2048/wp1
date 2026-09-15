<?php get_header(); ?>

<main>
    <div class="mainslider glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
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
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.982942 13.3923L12.2253 24.631C12.7186 25.123 13.5179 25.123 14.0124 24.631C14.5057 24.1389 14.5057 23.3397 14.0124 22.8476L3.66178 12.5007L14.0112 2.15378C14.5045 1.66172 14.5045 0.862477 14.0112 0.369169C13.5179 -0.122894 12.7174 -0.122894 12.2241 0.369169L0.981696 11.6077C0.495966 12.0947 0.495966 12.9065 0.982942 13.3923Z" fill="white"/>
                                </svg>
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.0171 11.6077L2.77467 0.369029C2.28137 -0.123032 1.48213 -0.123032 0.987571 0.369029C0.494263 0.861093 0.494264 1.66033 0.987572 2.15239L11.3382 12.4993L0.98882 22.8462C0.495512 23.3383 0.495512 24.1375 0.98882 24.6308C1.48213 25.1229 2.28261 25.1229 2.77592 24.6308L14.0183 13.3923C14.504 12.9053 14.504 12.0935 14.0171 11.6077Z" fill="white"/>
                                </svg>
                            </button>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
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
                </div>
                <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                    <h1 class="title underlined">
                        <?= get_field('about_title'); ?>
                    </h1>
                    <div class="about__text">
                        <?= get_field('about_description'); ?>
                    </div>
                    <a href="#" class="button">Узнать больше</a>
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
                        $image = get_field('team_image_array');
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

    <div class="toys" id="toys">
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

    <div class="aboutus" id="aboutus">
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

    <div class="contacts" id="contacts">
        <h1 class="title">
            <?= get_field('where_title'); ?>
        </h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contacts__descr underlined">
                        <?= get_field('where_description'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="map-google" class="contacts__map">
                        <iframe 
                            src="<?= get_field('contact_map_embed_src') ?>" 
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
                                foreach (get_field('contact_phones') as $i => $phone) {
                            ?>
                                <div class="contacts__phoneblock">
                                    Телефон №<?= $i + 1 ?>
                                    <div class="contacts__phonewrap">
                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/svg/phone-2.svg" alt="phone">
                                        <a href="tel:<?= $phone["phone"] ?>"><?= $phone["phone"] ?></a>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="contacts__mail">
                            Или напишите нам на почту
                            <a href="mailto:<?= get_field('contact_email') ?>">
                                <?= get_field('contact_email') ?>
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
<!-- 
<?php do_action('my_hook'); ?>

<?php do_action('my_greeting', 'day', 'Steve'); ?>

<?php do_action('my_greeting', 'morning', 'John Apple'); ?>

<p>
    <?= apply_filters('my_hello', 'Adam Adams'); ?>
</p>
<p>
    <?= apply_filters('my_goodbye', 'John Apple'); ?>
</p>
<p>
    <?= apply_filters('some_nonexisting_filter', 'Params for nonexisting filter') ?>
</p>
-->

<?php get_footer(); ?>
