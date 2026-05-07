<?php
$dining_title = hotel_landing_get_field('hotel_dining_title', hotel_landing_default('hotel_dining_title'));
$dining_items = hotel_landing_get_field('hotel_dining_items', hotel_landing_default('hotel_dining_items'));
$dining_button = hotel_landing_link(
    hotel_landing_get_field('hotel_dining_button', hotel_landing_default('hotel_dining_button')),
    hotel_landing_default('hotel_dining_button')['title'],
    hotel_landing_default('hotel_dining_button')['url']
);
?>

<section class="hotel-section hotel-dining" id="nha-hang">
    <div class="hotel-container">
        <?php if ($dining_title) : ?>
            <div class="hotel-section-heading hotel-section-heading--compact">
                <h2><?php echo esc_html($dining_title); ?></h2>
            </div>
        <?php endif; ?>

        <?php if (!empty($dining_items) && is_array($dining_items)) : ?>
            <div class="hotel-dining__grid">
                <?php foreach ($dining_items as $item) :
                    $title = !empty($item['title']) ? $item['title'] : '';
                    $description = !empty($item['description']) ? $item['description'] : '';
                    $image = !empty($item['image']) ? $item['image'] : null;
                    $image_url = hotel_landing_image_url($image);
                    $link = hotel_landing_link(!empty($item['link']) ? $item['link'] : null, $title, '#');
                    $style = $image_url ? sprintf(' style="background-image: linear-gradient(180deg, rgba(12, 8, 4, 0.12) 0%%, rgba(12, 8, 4, 0.84) 100%%), url(%s);"', esc_url($image_url)) : '';
                    ?>
                    <a class="hotel-dining-card" href="<?php echo esc_url($link['url']); ?>"<?php echo $link['target'] ? ' target="' . esc_attr($link['target']) . '"' : ''; ?><?php echo $style; ?>>
                        <span class="hotel-dining-card__placeholder" aria-hidden="true"></span>
                        <span class="hotel-dining-card__content">
                            <?php if ($title) : ?>
                                <strong><?php echo esc_html($title); ?></strong>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <small><?php echo esc_html($description); ?></small>
                            <?php endif; ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($dining_button['title'])) : ?>
            <div class="hotel-section-action">
                <a class="hotel-btn hotel-btn--gold hotel-btn--small" href="<?php echo esc_url($dining_button['url']); ?>"<?php echo $dining_button['target'] ? ' target="' . esc_attr($dining_button['target']) . '"' : ''; ?>>
                    <?php echo esc_html($dining_button['title']); ?>
                    <span aria-hidden="true">›</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
