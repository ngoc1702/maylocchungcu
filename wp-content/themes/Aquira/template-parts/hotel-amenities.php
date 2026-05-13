<?php
$features_title = hotel_landing_get_field('air_features_title', hotel_landing_default('air_features_title'));
$features_description = hotel_landing_get_field('air_features_description', hotel_landing_default('air_features_description'));
$features = hotel_landing_get_field('air_features', hotel_landing_default('air_features'));
?>

<section class="hotel-section hotel-amenities air-features" id="uudiem">
    <div class="hotel-container">
        <div class="hotel-section-heading air-section-heading">
            <?php if ($features_title) : ?>
                <h2><?php echo esc_html($features_title); ?></h2>
            <?php endif; ?>
            <?php if ($features_description) : ?>
                <p class="hotel-section-heading__description"><?php echo esc_html($features_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($features) && is_array($features)) : ?>
            <div class="air-features__grid">
                <?php foreach ($features as $feature) :
                    $icon = !empty($feature['icon']) ? $feature['icon'] : null;
                    $icon_url = hotel_landing_image_url($icon);
                    $icon_class = !empty($feature['icon_class']) ? hotel_landing_class_list($feature['icon_class']) : 'fa-solid fa-circle-check';
                    $title = !empty($feature['title']) ? $feature['title'] : '';
                    $description = !empty($feature['description']) ? $feature['description'] : '';

                    if (!$title && !$description) {
                        continue;
                    }
                    ?>
                    <article class="air-feature-card">
                        <div class="air-feature-card__icon">
                            <?php if ($icon_url) : ?>
                                <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($icon, $title)); ?>">
                            <?php else : ?>
                                <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                        </div>
                        <?php if ($title) : ?>
                            <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
