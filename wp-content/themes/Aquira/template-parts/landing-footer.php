<?php
$footer_logo = hotel_landing_get_field('air_footer_logo');
if (!hotel_landing_has_value($footer_logo)) {
    $footer_logo = hotel_landing_get_field('air_logo');
}
$footer_logo_url = hotel_landing_image_url($footer_logo);
$brand_name = hotel_landing_get_field('air_brand_name', hotel_landing_default('air_brand_name'));
$brand_subtitle = hotel_landing_get_field('air_brand_subtitle', hotel_landing_default('air_brand_subtitle'));
$footer_description = hotel_landing_get_field('air_footer_description', hotel_landing_default('air_footer_description'));
$product_links = hotel_landing_get_field('air_footer_product_links', hotel_landing_default('air_footer_product_links'));
$solution_links = hotel_landing_get_field('air_footer_solution_links', hotel_landing_default('air_footer_solution_links'));
$about_links = hotel_landing_get_field('air_footer_about_links', hotel_landing_default('air_footer_about_links'));
$contacts = hotel_landing_get_field('air_footer_contacts', hotel_landing_default('air_footer_contacts'));
$socials = hotel_landing_get_field('air_footer_socials', hotel_landing_default('air_footer_socials'));
$copyright = hotel_landing_get_field('air_copyright', hotel_landing_default('air_copyright'));
$render_links = function ($links) {
    if (empty($links) || !is_array($links)) {
        return;
    }

    foreach ($links as $link) {
        $label = !empty($link['label']) ? $link['label'] : '';
        $url = !empty($link['url']) ? $link['url'] : '#';

        if (!$label) {
            continue;
        }
        ?>
        <li><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a></li>
        <?php
    }
};
?>

<footer class="hotel-footer air-footer" id="footer">
    <div class="hotel-container">
        <div class="air-footer__grid">
            <div class="air-footer__brand">
                <a class="hotel-brand air-brand air-brand--footer" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr($brand_name); ?>">
                    <?php if ($footer_logo_url) : ?>
                        <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($footer_logo, $brand_name)); ?>">
                    <?php else : ?>
                        <span class="air-brand__wordmark"><?php echo esc_html($brand_name); ?></span>
                        <?php if ($brand_subtitle) : ?>
                            <span class="air-brand__subtitle"><?php echo esc_html($brand_subtitle); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </a>

                <?php if ($footer_description) : ?>
                    <p><?php echo esc_html($footer_description); ?></p>
                <?php endif; ?>

                <?php if (!empty($socials) && is_array($socials)) : ?>
                    <div class="air-footer__socials" aria-label="Social links">
                        <?php foreach ($socials as $social) :
                            $label = !empty($social['label']) ? $social['label'] : '';
                            $url = !empty($social['url']) ? $social['url'] : '#';
                            $icon = !empty($social['icon']) ? $social['icon'] : null;
                            $icon_url = hotel_landing_image_url($icon);
                            $icon_class = !empty($social['icon_class']) ? hotel_landing_class_list($social['icon_class']) : '';

                            if (!$label && !$icon_url && !$icon_class) {
                                continue;
                            }
                            ?>
                            <a href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr($label ?: 'Social'); ?>">
                                <?php if ($icon_url) : ?>
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="" aria-hidden="true">
                                <?php elseif ($icon_class) : ?>
                                    <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                                <?php else : ?>
                                    <?php echo esc_html(substr($label, 0, 1)); ?>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="air-footer__column">
                <h3>Sản phẩm</h3>
                <ul><?php $render_links($product_links); ?></ul>
            </div>

            <div class="air-footer__column">
                <h3>Giải pháp</h3>
                <ul><?php $render_links($solution_links); ?></ul>
            </div>

            <div class="air-footer__column">
                <h3>Về Auira</h3>
                <ul><?php $render_links($about_links); ?></ul>
            </div>

            <div class="air-footer__column">
                <h3>Liên hệ</h3>
                <?php if (!empty($contacts) && is_array($contacts)) : ?>
                    <ul class="air-footer__contacts">
                        <?php foreach ($contacts as $contact) :
                            $icon_class = !empty($contact['icon_class']) ? hotel_landing_class_list($contact['icon_class']) : '';
                            $text = !empty($contact['text']) ? $contact['text'] : '';
                            $url = !empty($contact['url']) ? $contact['url'] : '';

                            if (!$text) {
                                continue;
                            }
                            ?>
                            <li>
                                <?php if ($icon_class) : ?>
                                    <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                                <?php endif; ?>
                                <?php if ($url) : ?>
                                    <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($text); ?></a>
                                <?php else : ?>
                                    <span><?php echo esc_html($text); ?></span>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($copyright) : ?>
            <div class="air-footer__bottom">
                <p><?php echo esc_html($copyright); ?></p>
            </div>
        <?php endif; ?>
    </div>
</footer>
