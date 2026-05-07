<?php
$offers_title = hotel_landing_get_field('hotel_offers_title', hotel_landing_default('hotel_offers_title'));
$offers = hotel_landing_get_field('hotel_offers', hotel_landing_default('hotel_offers'));
?>

<section class="hotel-section hotel-offers" id="uu-dai">
    <div class="hotel-container">
        <?php if ($offers_title) : ?>
            <div class="hotel-section-heading hotel-section-heading--compact">
                <h2><?php echo esc_html($offers_title); ?></h2>
            </div>
        <?php endif; ?>

        <?php if (!empty($offers) && is_array($offers)) : ?>
            <div class="hotel-offers__grid">
                <?php foreach ($offers as $offer) :
                    $eyebrow = !empty($offer['eyebrow']) ? $offer['eyebrow'] : '';
                    $title = !empty($offer['title']) ? $offer['title'] : '';
                    $description = !empty($offer['description']) ? $offer['description'] : '';
                    $image = !empty($offer['image']) ? $offer['image'] : null;
                    $image_url = hotel_landing_image_url($image);
                    $link = hotel_landing_link(!empty($offer['link']) ? $offer['link'] : null, 'Đặt ngay', '#');
                    ?>
                    <article class="hotel-offer-card">
                        <div class="hotel-offer-card__content">
                            <?php if ($eyebrow) : ?>
                                <span><?php echo esc_html($eyebrow); ?></span>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($link['title'])) : ?>
                                <a class="hotel-text-link" href="<?php echo esc_url($link['url']); ?>"<?php echo $link['target'] ? ' target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                    <?php echo esc_html($link['title']); ?>
                                    <span aria-hidden="true">→</span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="hotel-offer-card__media">
                            <?php if ($image_url) : ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($image, $title)); ?>">
                            <?php else : ?>
                                <span class="hotel-offer-card__shape" aria-hidden="true"></span>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
