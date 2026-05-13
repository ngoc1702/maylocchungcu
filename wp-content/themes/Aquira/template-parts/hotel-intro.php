<?php
$intro_eyebrow = hotel_landing_get_field('air_intro_eyebrow', hotel_landing_default('air_intro_eyebrow'));
$intro_title = hotel_landing_get_field('air_intro_title', hotel_landing_default('air_intro_title'));
$intro_description = hotel_landing_get_field('air_intro_description', hotel_landing_default('air_intro_description'));
$intro_button = hotel_landing_link(
    hotel_landing_get_field('air_intro_button', hotel_landing_default('air_intro_button')),
    hotel_landing_default('air_intro_button')['title'],
    hotel_landing_default('air_intro_button')['url']
);
$intro_image = hotel_landing_get_field('air_intro_image');
$intro_secondary_image = hotel_landing_get_field('air_intro_secondary_image');
$intro_image_url = hotel_landing_image_url($intro_image);
$intro_secondary_image_url = hotel_landing_image_url($intro_secondary_image);
?>

<section class="hotel-section hotel-intro air-solution" id="giaiphap">
    <div class="hotel-container">
        <div class="air-solution__layout" id="ve-auira">
            <div class="air-solution__content">
                <?php if ($intro_eyebrow) : ?>
                    <p class="hotel-eyebrow air-eyebrow"><?php echo esc_html($intro_eyebrow); ?></p>
                <?php endif; ?>

                <?php if ($intro_title) : ?>
                    <h2><?php echo esc_html($intro_title); ?></h2>
                <?php endif; ?>

                <?php if ($intro_description) : ?>
                    <p><?php echo esc_html($intro_description); ?></p>
                <?php endif; ?>

                <?php if (!empty($intro_button['title'])) : ?>
                    <a class="air-outline-btn air-outline-btn--solid" href="<?php echo esc_url($intro_button['url']); ?>"<?php echo $intro_button['target'] ? ' target="' . esc_attr($intro_button['target']) . '"' : ''; ?>>
                        <?php echo esc_html($intro_button['title']); ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="air-solution__media">
                <figure class="air-solution__image air-solution__image--device">
                    <?php if ($intro_secondary_image_url) : ?>
                        <img src="<?php echo esc_url($intro_secondary_image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($intro_secondary_image, $intro_title)); ?>">
                    <?php else : ?>
                        <span class="air-product-placeholder air-product-placeholder--wall" aria-hidden="true"></span>
                    <?php endif; ?>
                </figure>
                <figure class="air-solution__image air-solution__image--room">
                    <?php if ($intro_image_url) : ?>
                        <img src="<?php echo esc_url($intro_image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($intro_image, $intro_title)); ?>">
                    <?php else : ?>
                        <span class="air-room-placeholder" aria-hidden="true"></span>
                    <?php endif; ?>
                </figure>
            </div>
        </div>
    </div>
</section>
