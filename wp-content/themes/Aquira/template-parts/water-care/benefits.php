<?php
$benefits_title = aquira_landing_get_field('water_benefits_title', aquira_landing_default('water_benefits_title'));
$benefits = aquira_landing_get_field('water_benefits', aquira_landing_default('water_benefits'));
?>

<section class="water-section water-benefits" id="services">
    <div class="water-container">
        <?php if ($benefits_title) : ?>
            <div class="water-section-heading">
                <h2><?php echo esc_html($benefits_title); ?></h2>
            </div>
        <?php endif; ?>

        <?php if (!empty($benefits) && is_array($benefits)) : ?>
            <div class="water-benefits__grid">
                <?php foreach (array_slice($benefits, 0, 4) as $benefit) :
                    $icon_class = !empty($benefit['icon_class']) ? aquira_landing_class_list($benefit['icon_class']) : 'fa-solid fa-circle-check';
                    $title = !empty($benefit['title']) ? $benefit['title'] : '';
                    $description = !empty($benefit['description']) ? $benefit['description'] : '';

                    if (!$title && !$description) {
                        continue;
                    }
                    ?>
                    <article class="water-benefit-card">
                        <span class="water-benefit-card__icon">
                            <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                        </span>
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
