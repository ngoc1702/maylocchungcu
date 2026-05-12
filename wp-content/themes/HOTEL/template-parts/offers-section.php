<?php
$offers_eyebrow = hotel_landing_get_field('hotel_offers_eyebrow', hotel_landing_default('hotel_offers_eyebrow'));
$offers_title = hotel_landing_get_field('hotel_offers_title', hotel_landing_default('hotel_offers_title'));
$offers_description = hotel_landing_get_field('hotel_offers_description', hotel_landing_default('hotel_offers_description'));
$offers = hotel_landing_get_field('hotel_offers', hotel_landing_default('hotel_offers'));
?>

<section class="hotel-section hotel-offers" id="uu-dai">
    <div class="hotel-container">
        <?php if ($offers_eyebrow || $offers_title || $offers_description) : ?>
            <div class="hotel-section-heading hotel-section-heading--offers">
                <?php if ($offers_eyebrow) : ?>
                    <p class="hotel-eyebrow"><?php echo esc_html($offers_eyebrow); ?></p>
                <?php endif; ?>
                <?php if ($offers_title) : ?>
                    <h2><?php echo esc_html($offers_title); ?></h2>
                <?php endif; ?>
                <?php if ($offers_description) : ?>
                    <p class="hotel-section-heading__description"><?php echo esc_html($offers_description); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($offers) && is_array($offers)) : ?>
            <div class="hotel-offers__track">
                <?php foreach ($offers as $offer) :
                    $eyebrow = !empty($offer['eyebrow']) ? $offer['eyebrow'] : '';
                    $title = !empty($offer['title']) ? $offer['title'] : '';
                    $description = !empty($offer['description']) ? $offer['description'] : '';
                    $image = !empty($offer['image']) ? $offer['image'] : null;
                    $image_url = hotel_landing_image_url($image);
                    $link = hotel_landing_link(!empty($offer['link']) ? $offer['link'] : null, 'Booking now', '#booking');
                    ?>
                    <a class="hotel-offer-card" href="<?php echo esc_url($link['url']); ?>"<?php echo $link['target'] ? ' target="' . esc_attr($link['target']) . '"' : ''; ?> aria-label="<?php echo esc_attr($link['title'] ?: $title); ?>">
                        <?php if ($image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($image, $eyebrow ?: $title)); ?>">
                        <?php else : ?>
                            <span class="hotel-image-placeholder" aria-hidden="true"></span>
                        <?php endif; ?>
                        <?php if ($eyebrow) : ?>
                            <span class="hotel-offer-card__tag"><?php echo esc_html($eyebrow); ?></span>
                        <?php endif; ?>
                        <div class="hotel-offer-card__content">
                            <div class="hotel-offer-card__body">
                                <?php if ($title) : ?>
                                    <h3><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <p class="hotel-offer-card__description"><?php echo esc_html($description); ?></p>
                                <?php endif; ?>
                            </div>
                            <span class="hotel-offer-card__arrow" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 18 12" fill="none"><path d="M-2.18557e-07 6L15.6008 6.00004M11.0001 1L16 6.00004L11 11" stroke="white" stroke-width="1.5"></path></svg>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
