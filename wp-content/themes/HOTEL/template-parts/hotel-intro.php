<?php
$intro_title = hotel_landing_get_field('hotel_intro_title', hotel_landing_default('hotel_intro_title'));
$intro_description = hotel_landing_get_field('hotel_intro_description', hotel_landing_default('hotel_intro_description'));
$intro_items = hotel_landing_get_field('hotel_intro_items', hotel_landing_default('hotel_intro_items'));
?>

<section class="hotel-section hotel-intro" id="gioi-thieu">
    <div class="hotel-container">
        <div class="hotel-section-heading">
            <?php if ($intro_title) : ?>
                <h2><?php echo esc_html($intro_title); ?></h2>
            <?php endif; ?>
            <?php if ($intro_description) : ?>
                <p><?php echo esc_html($intro_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($intro_items) && is_array($intro_items)) : ?>
            <div class="hotel-intro__grid">
                <?php foreach ($intro_items as $item) :
                    $icon = !empty($item['icon']) ? $item['icon'] : null;
                    $icon_url = hotel_landing_image_url($icon);
                    $icon_class = !empty($item['icon_class']) ? hotel_landing_class_list($item['icon_class']) : '';
                    $title = !empty($item['title']) ? $item['title'] : '';
                    $description = !empty($item['description']) ? $item['description'] : '';
                    ?>
                    <article class="hotel-intro-card">
                        <div class="hotel-icon hotel-intro-card__icon">
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
