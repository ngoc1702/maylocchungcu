<?php
$hero_background = hotel_landing_get_field('hotel_hero_background');
$hero_title = hotel_landing_get_field('hotel_hero_title', hotel_landing_default('hotel_hero_title'));
$hero_script_title = hotel_landing_get_field('hotel_hero_script_title', hotel_landing_default('hotel_hero_script_title'));
$hero_description = hotel_landing_get_field('hotel_hero_description', hotel_landing_default('hotel_hero_description'));
$hero_button = hotel_landing_link(
    hotel_landing_get_field('hotel_hero_button', hotel_landing_default('hotel_hero_button')),
    hotel_landing_default('hotel_hero_button')['title'],
    hotel_landing_default('hotel_hero_button')['url']
);

$hero_background_url = hotel_landing_image_url($hero_background);
$hero_style = $hero_background_url
    ? sprintf(' style="background-image: linear-gradient(90deg, rgba(15, 9, 5, 0.86) 0%%, rgba(15, 9, 5, 0.42) 48%%, rgba(15, 9, 5, 0.18) 100%%), url(%s);"', esc_url($hero_background_url))
    : '';
?>

<section class="hotel-hero" id="top"<?php echo $hero_style; ?>>
    <div class="hotel-container hotel-hero__inner">
        <div class="hotel-hero__content">
            <?php if ($hero_title) : ?>
                <h1 class="hotel-hero__title"><?php echo nl2br(esc_html($hero_title)); ?></h1>
            <?php endif; ?>

            <?php if ($hero_script_title) : ?>
                <p class="hotel-hero__script"><?php echo esc_html($hero_script_title); ?></p>
            <?php endif; ?>

            <?php if ($hero_description) : ?>
                <p class="hotel-hero__description"><?php echo esc_html($hero_description); ?></p>
            <?php endif; ?>

            <?php if (!empty($hero_button['title'])) : ?>
                <a class="hotel-btn hotel-btn--gold" href="<?php echo esc_url($hero_button['url']); ?>"<?php echo $hero_button['target'] ? ' target="' . esc_attr($hero_button['target']) . '"' : ''; ?>>
                    <?php echo esc_html($hero_button['title']); ?>
                    <span aria-hidden="true">›</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
