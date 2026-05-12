<?php
$dining_eyebrow = hotel_landing_get_field('hotel_dining_eyebrow', hotel_landing_default('hotel_dining_eyebrow'));
$dining_title = hotel_landing_get_field('hotel_dining_title', hotel_landing_default('hotel_dining_title'));
$dining_description = hotel_landing_get_field('hotel_dining_description', hotel_landing_default('hotel_dining_description'));
$dining_items = hotel_landing_get_field('hotel_dining_items', hotel_landing_default('hotel_dining_items'));
$dining_button = hotel_landing_link(
    hotel_landing_get_field('hotel_dining_button', hotel_landing_default('hotel_dining_button')),
    hotel_landing_default('hotel_dining_button')['title'],
    hotel_landing_default('hotel_dining_button')['url']
);
?>

<section class="hotel-section hotel-dining" id="nha-hang">
    <div class="hotel-container">
        <?php if ($dining_eyebrow || $dining_title || $dining_description || !empty($dining_button['title'])) : ?>
            <div class="hotel-section-heading hotel-section-heading--dining">
                <?php if ($dining_eyebrow) : ?>
                    <p class="hotel-eyebrow"><?php echo esc_html($dining_eyebrow); ?></p>
                <?php endif; ?>
                <?php if ($dining_title) : ?>
                    <h2><?php echo esc_html($dining_title); ?></h2>
                <?php endif; ?>
                <?php if ($dining_description) : ?>
                    <p class="hotel-section-heading__description"><?php echo esc_html($dining_description); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($dining_items) && is_array($dining_items)) : ?>
            <div class="hotel-dining__grid">
                <?php foreach (array_slice($dining_items, 0, 4) as $index => $item) :
                    $title = !empty($item['title']) ? $item['title'] : '';
                    $description = !empty($item['description']) ? $item['description'] : '';
                    $image = !empty($item['image']) ? $item['image'] : null;
                    $image_url = hotel_landing_image_url($image);
                    $link = hotel_landing_link(!empty($item['link']) ? $item['link'] : null, $title, '#');
                    $card_class = 'hotel-dining-card hotel-dining-card--' . ($index + 1);
                    ?>
                    <div class="<?php echo esc_attr($card_class); ?>" <?php echo $link['target'] ? ' target="' . esc_attr($link['target']) . '"' : ''; ?>>
                        <?php if ($image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($image, $title)); ?>">
                        <?php else : ?>
                            <span class="hotel-image-placeholder" aria-hidden="true"></span>
                        <?php endif; ?>
                        <span class="hotel-dining-card__content">
                            <?php if ($title) : ?>
                                <strong><?php echo esc_html($title); ?></strong>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <small><?php echo esc_html($description); ?></small>
                            <?php endif; ?>
                        </span>
                            </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($dining_button['title'])) : ?>
                    <div class="hotel-dining__action">
                        <a class="hotel-btn hotel-btn--gold hotel-btn--small" href="<?php echo esc_url($dining_button['url']); ?>"<?php echo $dining_button['target'] ? ' target="' . esc_attr($dining_button['target']) . '"' : ''; ?>>
                            <?php echo esc_html($dining_button['title']); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 18 12" fill="none"><path d="M-2.18557e-07 6L15.6008 6.00004M11.0001 1L16 6.00004L11 11" stroke="white" stroke-width="1.5"></path></svg>
                        </a>
                    </div>
                <?php endif; ?>

    </div>
</section>
