<?php
$logo = hotel_landing_get_field('hotel_logo');
$logo_url = hotel_landing_image_url($logo);
$brand_name = hotel_landing_get_field('hotel_brand_name', hotel_landing_default('hotel_brand_name'));
$brand_subtitle = hotel_landing_get_field('hotel_brand_subtitle', hotel_landing_default('hotel_brand_subtitle'));
$nav_items = hotel_landing_get_field('hotel_nav_items', hotel_landing_default('hotel_nav_items'));
$language_enabled = (bool) hotel_landing_get_field('hotel_header_language_enabled', hotel_landing_default('hotel_header_language_enabled'));
$language_shortcode = hotel_landing_get_field('hotel_header_language_shortcode', hotel_landing_default('hotel_header_language_shortcode'));
$language_selector = '';
$booking_button = hotel_landing_link(
    hotel_landing_get_field('hotel_booking_button', hotel_landing_default('hotel_booking_button')),
    hotel_landing_default('hotel_booking_button')['title'],
    hotel_landing_default('hotel_booking_button')['url']
);

if ($language_enabled && $language_shortcode) {
    if (preg_match('/\[\s*([A-Za-z0-9_-]+)/', $language_shortcode, $language_shortcode_match) && !shortcode_exists($language_shortcode_match[1])) {
        $language_selector = '';
    } else {
        $language_selector = do_shortcode($language_shortcode);
    }
}
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

        <?php if ($language_selector || !empty($booking_button['title'])) : ?>
            <div class="hotel-header-actions">
                <?php if ($language_selector) : ?>
                    <div class="hotel-language-switcher" aria-label="<?php echo esc_attr__('Language selector', 'hotel'); ?>">
                        <?php echo $language_selector; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($booking_button['title'])) : ?>
                    <a class="hotel-booking-btn" href="<?php echo esc_url($booking_button['url']); ?>"<?php echo $booking_button['target'] ? ' target="' . esc_attr($booking_button['target']) . '"' : ''; ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar mr-2 h-4 w-4"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                        <?php echo esc_html($booking_button['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</header>
