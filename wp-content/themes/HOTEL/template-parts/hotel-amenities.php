<?php
$amenities_title = hotel_landing_get_field('hotel_amenities_title', hotel_landing_default('hotel_amenities_title'));
$amenities = hotel_landing_get_field('hotel_amenities', hotel_landing_default('hotel_amenities'));
?>

<section class="hotel-section hotel-amenities" id="tien-ich">
    <div class="hotel-container">
        <?php if ($amenities_title) : ?>
            <div class="hotel-section-heading hotel-section-heading--compact">
                <h2><?php echo esc_html($amenities_title); ?></h2>
            </div>
        <?php endif; ?>

        <?php if (!empty($amenities) && is_array($amenities)) : ?>
            <div class="hotel-amenities__grid">
                <?php foreach ($amenities as $amenity) :
                    $icon = !empty($amenity['icon']) ? $amenity['icon'] : null;
                    $icon_url = hotel_landing_image_url($icon);
                    $icon_class = !empty($amenity['icon_class']) ? hotel_landing_class_list($amenity['icon_class']) : '';
                    $title = !empty($amenity['title']) ? $amenity['title'] : '';
                    $description = !empty($amenity['description']) ? $amenity['description'] : '';
                    ?>
                    <article class="hotel-amenity">
                        <div class="hotel-icon hotel-amenity__icon">
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
        <?php endif; ?>
    </div>
</section>
