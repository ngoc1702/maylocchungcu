<?php
$hero_background = hotel_landing_get_field('air_hero_background');
$hero_product = hotel_landing_get_field('air_hero_product_image');
$hero_title = hotel_landing_get_field('air_hero_title', hotel_landing_default('air_hero_title'));
$hero_subtitle = hotel_landing_get_field('air_hero_subtitle', hotel_landing_default('air_hero_subtitle'));
$hero_description = hotel_landing_get_field('air_hero_description', hotel_landing_default('air_hero_description'));
$brand_name = hotel_landing_get_field('air_brand_name', hotel_landing_default('air_brand_name'));
$hero_button = hotel_landing_link(
    hotel_landing_get_field('air_hero_button', hotel_landing_default('air_hero_button')),
    hotel_landing_default('air_hero_button')['title'],
    hotel_landing_default('air_hero_button')['url']
);
$hero_badges = hotel_landing_get_field('air_hero_badges', hotel_landing_default('air_hero_badges'));
$form_title = hotel_landing_get_field('air_form_title', hotel_landing_default('air_form_title'));
$form_description = hotel_landing_get_field('air_form_description', hotel_landing_default('air_form_description'));
$form_shortcode = hotel_landing_get_field('air_form_shortcode', hotel_landing_default('air_form_shortcode'));
$form_action = hotel_landing_get_field('air_form_action', hotel_landing_default('air_form_action'));
$form_name_placeholder = hotel_landing_get_field('air_form_name_placeholder', hotel_landing_default('air_form_name_placeholder'));
$form_phone_placeholder = hotel_landing_get_field('air_form_phone_placeholder', hotel_landing_default('air_form_phone_placeholder'));
$form_location_placeholder = hotel_landing_get_field('air_form_location_placeholder', hotel_landing_default('air_form_location_placeholder'));
$form_submit_text = hotel_landing_get_field('air_form_submit_text', hotel_landing_default('air_form_submit_text'));
$form_privacy_text = hotel_landing_get_field('air_form_privacy_text', hotel_landing_default('air_form_privacy_text'));

$hero_background_url = hotel_landing_image_url($hero_background);
$hero_product_url = hotel_landing_image_url($hero_product);
$hero_style = $hero_background_url
    ? sprintf(' style="background-image: linear-gradient(90deg, rgba(239, 249, 249, 0.92) 0%%, rgba(239, 249, 249, 0.78) 50%%, rgba(239, 249, 249, 0.28) 100%%), url(%s);"', esc_url($hero_background_url))
    : '';
?>

<section class="hotel-hero air-hero" id="top"<?php echo $hero_style; ?>>
    <div class="hotel-container air-hero__inner">
        <div class="air-hero__content">
            <?php if ($hero_title) : ?>
                <h1 class="hotel-hero__title air-hero__title"><?php echo nl2br(esc_html($hero_title)); ?></h1>
            <?php endif; ?>

            <?php if ($hero_subtitle) : ?>
                <p class="hotel-hero__subtitle air-hero__subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            <?php endif; ?>

            <?php if ($hero_description) : ?>
                <p class="air-hero__description"><?php echo esc_html($hero_description); ?></p>
            <?php endif; ?>

            <?php if (!empty($hero_button['title'])) : ?>
                <a class="air-text-link" href="<?php echo esc_url($hero_button['url']); ?>"<?php echo $hero_button['target'] ? ' target="' . esc_attr($hero_button['target']) . '"' : ''; ?>>
                    <?php echo esc_html($hero_button['title']); ?>
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            <?php endif; ?>
        </div>

        <div class="air-hero__visual" aria-label="<?php echo esc_attr($brand_name); ?>">
            <div class="air-window-scene" aria-hidden="true">
                <span class="air-window-scene__plant"></span>
                <span class="air-window-scene__chair"></span>
                <span class="air-window-scene__skyline"></span>
            </div>

            <div class="air-product-hero">
                <?php if ($hero_product_url) : ?>
                    <img src="<?php echo esc_url($hero_product_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($hero_product, $hero_title)); ?>">
                <?php else : ?>
                    <span class="air-product-placeholder air-product-placeholder--hero" aria-hidden="true"></span>
                <?php endif; ?>
            </div>

            <?php if (!empty($hero_badges) && is_array($hero_badges)) : ?>
                <div class="air-hero__badges" aria-label="Thông số nổi bật">
                    <?php foreach (array_slice($hero_badges, 0, 3) as $badge) :
                        $label = !empty($badge['label']) ? $badge['label'] : '';
                        $value = !empty($badge['value']) ? $badge['value'] : '';

                        if (!$label && !$value) {
                            continue;
                        }
                        ?>
                        <span>
                            <?php if ($label) : ?>
                                <strong><?php echo esc_html($label); ?></strong>
                            <?php endif; ?>
                            <?php if ($value) : ?>
                                <small><?php echo esc_html($value); ?></small>
                            <?php endif; ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="air-consult-panel" id="consult" aria-label="<?php echo esc_attr($form_title); ?>">
    <div class="hotel-container">
        <div class="air-consult-panel__card">
            <div class="air-consult-panel__heading">
                <?php if ($form_title) : ?>
                    <h2><?php echo esc_html($form_title); ?></h2>
                <?php endif; ?>
                <?php if ($form_description) : ?>
                    <p><?php echo esc_html($form_description); ?></p>
                <?php endif; ?>
            </div>

            <?php if ($form_shortcode) : ?>
                <div class="air-consult-panel__shortcode">
                    <?php echo do_shortcode($form_shortcode); ?>
                </div>
            <?php else : ?>
                <form class="air-consult-form" action="<?php echo esc_url($form_action ?: '#'); ?>" method="post">
                    <label>
                        <span class="screen-reader-text"><?php echo esc_html($form_name_placeholder); ?></span>
                        <i class="fa-regular fa-user" aria-hidden="true"></i>
                        <input type="text" name="air_customer_name" placeholder="<?php echo esc_attr($form_name_placeholder); ?>">
                    </label>
                    <label>
                        <span class="screen-reader-text"><?php echo esc_html($form_phone_placeholder); ?></span>
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        <input type="tel" name="air_customer_phone" placeholder="<?php echo esc_attr($form_phone_placeholder); ?>">
                    </label>
                    <label>
                        <span class="screen-reader-text"><?php echo esc_html($form_location_placeholder); ?></span>
                        <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                        <input type="text" name="air_customer_location" placeholder="<?php echo esc_attr($form_location_placeholder); ?>">
                    </label>
                    <button type="submit">
                        <?php echo esc_html($form_submit_text); ?>
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </form>
            <?php endif; ?>

            <?php if ($form_privacy_text) : ?>
                <p class="air-consult-panel__privacy">
                    <i class="fa-solid fa-lock" aria-hidden="true"></i>
                    <?php echo esc_html($form_privacy_text); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
