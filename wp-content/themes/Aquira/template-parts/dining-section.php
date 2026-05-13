<?php
$certifications_title = hotel_landing_get_field('air_certifications_title', hotel_landing_default('air_certifications_title'));
$certifications_description = hotel_landing_get_field('air_certifications_description', hotel_landing_default('air_certifications_description'));
$certifications = hotel_landing_get_field('air_certifications', hotel_landing_default('air_certifications'));
?>

<section class="hotel-section hotel-dining air-certifications" id="chungnhan">
    <div class="hotel-container">
        <div class="hotel-section-heading air-section-heading">
            <?php if ($certifications_title) : ?>
                <h2><?php echo esc_html($certifications_title); ?></h2>
            <?php endif; ?>
            <?php if ($certifications_description) : ?>
                <p class="hotel-section-heading__description"><?php echo esc_html($certifications_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($certifications) && is_array($certifications)) : ?>
            <div class="air-certifications__grid">
                <?php foreach ($certifications as $certification) :
                    $logo = !empty($certification['logo']) ? $certification['logo'] : null;
                    $logo_url = hotel_landing_image_url($logo);
                    $icon_class = !empty($certification['icon_class']) ? hotel_landing_class_list($certification['icon_class']) : 'fa-solid fa-award';
                    $title = !empty($certification['title']) ? $certification['title'] : '';
                    $description = !empty($certification['description']) ? $certification['description'] : '';

                    if (!$title && !$description) {
                        continue;
                    }
                    ?>
                    <article class="air-certification-card">
                        <div class="air-certification-card__mark">
                            <?php if ($logo_url) : ?>
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($logo, $title)); ?>">
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
