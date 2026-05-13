<?php
$features = hotel_landing_get_field('hotel_quick_features', hotel_landing_default('hotel_quick_features'));

if (!empty($features) && is_array($features)) :
    $features = array_slice($features, 0, 4);
    ?>
    <section class="hotel-quick-features" aria-label="Hotel highlights">
        <div class="hotel-container">
            <div class="hotel-quick-features__grid">
                <?php foreach ($features as $feature) :
                    $icon = !empty($feature['icon']) ? $feature['icon'] : null;
                    $icon_url = hotel_landing_image_url($icon);
                    $icon_class = !empty($feature['icon_class']) ? hotel_landing_class_list($feature['icon_class']) : '';
                    $title = !empty($feature['title']) ? $feature['title'] : '';
                    $description = !empty($feature['description']) ? $feature['description'] : '';

                    if (!$title && !$description) {
                        continue;
                    }
                    ?>
                    <article class="hotel-quick-feature">
                        <div class="hotel-icon hotel-quick-feature__icon">
                            <?php if ($icon_url) : ?>
                                <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($icon, $title)); ?>">
                            <?php elseif ($icon_class) : ?>
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
        </div>
    </section>
<?php endif; ?>
