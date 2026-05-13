<?php
$logo = hotel_landing_get_field('air_logo');
$logo_url = hotel_landing_image_url($logo);
$brand_name = hotel_landing_get_field('air_brand_name', hotel_landing_default('air_brand_name'));
$brand_subtitle = hotel_landing_get_field('air_brand_subtitle', hotel_landing_default('air_brand_subtitle'));
$nav_items = hotel_landing_get_field('air_nav_items', hotel_landing_default('air_nav_items'));
$header_button = hotel_landing_link(
    hotel_landing_get_field('air_header_button', hotel_landing_default('air_header_button')),
    hotel_landing_default('air_header_button')['title'],
    hotel_landing_default('air_header_button')['url']
);
?>

<header class="hotel-landing-header air-header" id="landing-header">
    <div class="hotel-container air-header__inner">
        <a class="hotel-brand air-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr($brand_name); ?>">
            <?php if ($logo_url) : ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($logo, $brand_name)); ?>">
            <?php else : ?>
                <span class="air-brand__wordmark"><?php echo esc_html($brand_name); ?></span>
                <?php if ($brand_subtitle) : ?>
                    <span class="air-brand__subtitle"><?php echo esc_html($brand_subtitle); ?></span>
                <?php endif; ?>
            <?php endif; ?>
        </a>

        <?php if (!empty($nav_items) && is_array($nav_items)) : ?>
            <nav class="hotel-nav air-nav" aria-label="Landing navigation">
                <?php foreach ($nav_items as $item) :
                    $label = !empty($item['label']) ? $item['label'] : '';
                    $url = !empty($item['url']) ? $item['url'] : '#';

                    if (!$label) {
                        continue;
                    }
                    ?>
                    <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>

        <?php if (!empty($header_button['title'])) : ?>
            <a class="hotel-booking-btn air-header__button" href="<?php echo esc_url($header_button['url']); ?>"<?php echo $header_button['target'] ? ' target="' . esc_attr($header_button['target']) . '"' : ''; ?>>
                <?php echo esc_html($header_button['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</header>
