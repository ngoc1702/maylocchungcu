<?php
$brand_name = aquira_landing_get_field('water_brand_full_name', aquira_landing_default('water_brand_full_name'));
$footer_description = aquira_landing_get_field('water_footer_description', aquira_landing_default('water_footer_description'));
$footer_links = aquira_landing_get_field('water_footer_links', aquira_landing_default('water_footer_links'));
$support_links = aquira_landing_get_field('water_footer_support_links', aquira_landing_default('water_footer_support_links'));
$socials = aquira_landing_get_field('water_footer_socials', aquira_landing_default('water_footer_socials'));
$copyright = aquira_landing_get_field('water_copyright', aquira_landing_default('water_copyright'));

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
                <a class="water-footer__logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr($brand_name); ?>">
                    <span><i class="fa-solid fa-droplet" aria-hidden="true"></i></span>
                    <?php echo esc_html($brand_name); ?>
                </a>
                <?php if ($footer_description) : ?>
                    <p><?php echo esc_html($footer_description); ?></p>
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
            <?php if ($copyright) : ?>
                <p><?php echo esc_html($copyright); ?></p>
            <?php endif; ?>

            <?php if (!empty($socials) && is_array($socials)) : ?>
                <div class="water-footer__socials" aria-label="Social links">
                    <?php foreach ($socials as $social) :
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
