<?php
$logo = hotel_landing_get_field('hotel_logo');
$logo_url = hotel_landing_image_url($logo);
$brand_name = hotel_landing_get_field('hotel_brand_name', hotel_landing_default('hotel_brand_name'));
$brand_subtitle = hotel_landing_get_field('hotel_brand_subtitle', hotel_landing_default('hotel_brand_subtitle'));
$nav_items = hotel_landing_get_field('hotel_nav_items', hotel_landing_default('hotel_nav_items'));
$booking_button = hotel_landing_link(
    hotel_landing_get_field('hotel_booking_button', hotel_landing_default('hotel_booking_button')),
    hotel_landing_default('hotel_booking_button')['title'],
    hotel_landing_default('hotel_booking_button')['url']
);
?>

<header class="hotel-landing-header" id="landing-header">
    <div class="hotel-container hotel-landing-header__inner">
        <a class="hotel-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr($brand_name); ?>">
            <?php if ($logo_url) : ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($logo, $brand_name)); ?>">
            <?php else : ?>
                <span class="hotel-brand__mark" aria-hidden="true"><span></span><span></span></span>
                <span class="hotel-brand__text">
                    <span class="hotel-brand__name"><?php echo esc_html($brand_name); ?></span>
                    <?php if ($brand_subtitle) : ?>
                        <span class="hotel-brand__subtitle"><?php echo esc_html($brand_subtitle); ?></span>
                    <?php endif; ?>
                </span>
            <?php endif; ?>
        </a>

        <?php if (!empty($nav_items) && is_array($nav_items)) : ?>
            <nav class="hotel-nav" aria-label="Landing navigation">
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

        <?php if (!empty($booking_button['title'])) : ?>
            <a class="hotel-booking-btn" href="<?php echo esc_url($booking_button['url']); ?>"<?php echo $booking_button['target'] ? ' target="' . esc_attr($booking_button['target']) . '"' : ''; ?>>
                <i class="fa-regular fa-calendar-check" aria-hidden="true"></i>
                <?php echo esc_html($booking_button['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</header>
