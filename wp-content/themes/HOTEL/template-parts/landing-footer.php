<?php
$footer_logo = hotel_landing_get_field('hotel_footer_logo');
$footer_logo_url = hotel_landing_image_url($footer_logo);
$brand_name = hotel_landing_get_field('hotel_brand_name', hotel_landing_default('hotel_brand_name'));
$brand_subtitle = hotel_landing_get_field('hotel_brand_subtitle', hotel_landing_default('hotel_brand_subtitle'));
$description = hotel_landing_get_field('hotel_footer_description', hotel_landing_default('hotel_footer_description'));
$contacts = hotel_landing_get_field('hotel_footer_contacts', hotel_landing_default('hotel_footer_contacts'));
$socials = hotel_landing_get_field('hotel_footer_socials', hotel_landing_default('hotel_footer_socials'));
$links = hotel_landing_get_field('hotel_footer_links', hotel_landing_default('hotel_footer_links'));
$newsletter_title = hotel_landing_get_field('hotel_newsletter_title', hotel_landing_default('hotel_newsletter_title'));
$newsletter_text = hotel_landing_get_field('hotel_newsletter_text', hotel_landing_default('hotel_newsletter_text'));
$newsletter_shortcode = hotel_landing_get_field('hotel_newsletter_shortcode', '');
$newsletter_placeholder = hotel_landing_get_field('hotel_newsletter_placeholder', hotel_landing_default('hotel_newsletter_placeholder'));
$newsletter_button = hotel_landing_get_field('hotel_newsletter_button', hotel_landing_default('hotel_newsletter_button'));
$copyright = hotel_landing_get_field('hotel_copyright', hotel_landing_default('hotel_copyright'));
$policy_links = hotel_landing_get_field('hotel_policy_links', hotel_landing_default('hotel_policy_links'));
?>

<footer class="hotel-footer" id="lien-he">
    <div class="hotel-container">
        <div class="hotel-footer__grid">
            <div class="hotel-footer__brand">
                <a class="hotel-brand hotel-brand--footer" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ($footer_logo_url) : ?>
                        <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($footer_logo, $brand_name)); ?>">
                    <?php else : ?>
                        <span class="hotel-brand__name"><?php echo esc_html($brand_name); ?></span>
                        <span class="hotel-brand__subtitle"><?php echo esc_html($brand_subtitle); ?></span>
                    <?php endif; ?>
                </a>
                <?php if ($description) : ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
                <?php if (!empty($socials) && is_array($socials)) : ?>
                    <div class="hotel-footer__socials">
                        <?php foreach ($socials as $social) :
                            $icon_class = !empty($social['icon_class']) ? hotel_landing_class_list($social['icon_class']) : '';
                            $url = !empty($social['url']) ? $social['url'] : '#';

                            if (!$icon_class) {
                                continue;
                            }
                            ?>
                            <a href="<?php echo esc_url($url); ?>" aria-label="Social link">
                                <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="hotel-footer__column">
                <h3>Thông tin liên hệ</h3>
                <?php if (!empty($contacts) && is_array($contacts)) : ?>
                    <ul class="hotel-footer__list">
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

            <div class="hotel-footer__column">
                <h3>Liên kết nhanh</h3>
                <?php if (!empty($links) && is_array($links)) : ?>
                    <ul class="hotel-footer__links">
                        <?php foreach ($links as $link) :
                            $label = !empty($link['label']) ? $link['label'] : '';
                            $url = !empty($link['url']) ? $link['url'] : '#';

                            if (!$label) {
                                continue;
                            }
                            ?>
                            <li><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="hotel-footer__column hotel-footer__newsletter">
                <?php if ($newsletter_title) : ?>
                    <h3><?php echo esc_html($newsletter_title); ?></h3>
                <?php endif; ?>
                <?php if ($newsletter_text) : ?>
                    <p><?php echo esc_html($newsletter_text); ?></p>
                <?php endif; ?>
                <?php if ($newsletter_shortcode) : ?>
                    <?php echo do_shortcode($newsletter_shortcode); ?>
                <?php else : ?>
                    <form action="#" method="post">
                        <label class="screen-reader-text" for="hotel-newsletter-email"><?php echo esc_html($newsletter_placeholder); ?></label>
                        <input id="hotel-newsletter-email" type="email" placeholder="<?php echo esc_attr($newsletter_placeholder); ?>">
                        <button type="submit"><?php echo esc_html($newsletter_button); ?></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <div class="hotel-footer__bottom">
            <?php if ($copyright) : ?>
                <p><?php echo esc_html($copyright); ?></p>
            <?php endif; ?>
            <?php if (!empty($policy_links) && is_array($policy_links)) : ?>
                <div class="hotel-footer__policies">
                    <?php foreach ($policy_links as $link) :
                        $label = !empty($link['label']) ? $link['label'] : '';
                        $url = !empty($link['url']) ? $link['url'] : '#';

                        if (!$label) {
                            continue;
                        }
                        ?>
                        <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>
