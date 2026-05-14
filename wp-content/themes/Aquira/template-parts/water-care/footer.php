<?php
$footer_logo = aquira_landing_get_field('water_footer_logo');

if (!$footer_logo) {
    $footer_logo = aquira_landing_get_field('water_logo');
}

$footer_logo_url = '';

if (is_array($footer_logo) && !empty($footer_logo['url'])) {
    $footer_logo_url = $footer_logo['url'];
} elseif (is_numeric($footer_logo)) {
    $footer_logo_url = wp_get_attachment_image_url($footer_logo, 'full');
} elseif (is_string($footer_logo) && filter_var($footer_logo, FILTER_VALIDATE_URL)) {
    $footer_logo_url = $footer_logo;
}
$brand_name = aquira_landing_get_field('water_brand_full_name', aquira_landing_default('water_brand_full_name'));
$footer_description = aquira_landing_get_field('water_footer_description', aquira_landing_default('water_footer_description'));
$footer_links = aquira_landing_get_field('water_footer_links', aquira_landing_default('water_footer_links'));
$support_links = aquira_landing_get_field('water_footer_support_links', aquira_landing_default('water_footer_support_links'));
$socials = aquira_landing_get_field('water_footer_socials', aquira_landing_default('water_footer_socials'));
$copyright = aquira_landing_get_field('water_copyright', aquira_landing_default('water_copyright'));
$contacts = aquira_landing_get_field('water_footer_contacts', aquira_landing_default('water_footer_contacts'));
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

<footer class="water-footer" id="footer">
    <div class="water-container">
        <div class="water-footer__top">
            <div class="water-footer__brand">
             <a class="water-footer__logo"
   href="<?php echo esc_url(home_url('/')); ?>"
   aria-label="<?php echo esc_attr($brand_name); ?>">

    <?php if (!empty($footer_logo_url)) : ?>
        <img
            src="<?php echo esc_url($footer_logo_url); ?>"
            alt="<?php echo esc_attr($brand_name); ?>">
    <?php else : ?>
        <span><i class="fa-solid fa-droplet" aria-hidden="true"></i></span>
        <?php echo esc_html($brand_name); ?>
    <?php endif; ?>

</a>
                <?php if ($footer_description): ?>
                    <p><?php echo esc_html($footer_description); ?></p>
                <?php endif; ?>

                <?php if (!empty($contacts) && is_array($contacts)): ?>
                    <ul class="water-footer__list">
                        <?php foreach ($contacts as $contact):
                            $icon_class = !empty($contact['icon_class']) ? aquira_landing_class_list($contact['icon_class']) : '';
                            $text = !empty($contact['text']) ? $contact['text'] : '';
                            $url = !empty($contact['url']) ? $contact['url'] : '';
                            $is_map_link = strpos($icon_class, 'map-location') !== false;

                            if (!$text || $is_map_link) {
                                continue;
                            }
                            ?>
                            <li>
                                <?php if ($icon_class): ?>
                                    <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                                <?php endif; ?>
                                <?php if ($url): ?>
                                    <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($text); ?></a>
                                <?php else: ?>
                                    <span><?php echo esc_html($text); ?></span>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="water-footer__columns">
                <div class="water-footer__column">
                    <h2>Liên kết</h2>
                    <ul><?php $render_links($footer_links); ?></ul>
                </div>
                <div class="water-footer__column">
                    <h2>Hỗ trợ</h2>
                    <ul><?php $render_links($support_links); ?></ul>
                </div>
            </div>
        </div>

        <div class="water-footer__bottom">
            <?php if ($copyright): ?>
                <p><?php echo esc_html($copyright); ?></p>
            <?php endif; ?>

            <?php if (!empty($socials) && is_array($socials)): ?>
                <div class="water-footer__socials" aria-label="Social links">
                    <?php foreach ($socials as $social):
                        $label = !empty($social['label']) ? $social['label'] : 'Social';
                        $url = !empty($social['url']) ? $social['url'] : '#';
                        $icon_class = !empty($social['icon_class']) ? aquira_landing_class_list($social['icon_class']) : '';

                        if (!$icon_class) {
                            continue;
                        }
                        ?>
                        <a href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr($label); ?>">
                            <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>