<?php
$trust_items = aquira_landing_get_field('water_trust_items', aquira_landing_default('water_trust_items'));
?>

<?php if (!empty($trust_items) && is_array($trust_items)) : ?>
    <section class="water-trust-strip" id="camket" aria-label="Cam kết dịch vụ">
        <div class="water-container">
            <div class="water-trust-strip__grid">
                <?php foreach (array_slice($trust_items, 0, 3) as $item) :
                    $icon_class = !empty($item['icon_class']) ? aquira_landing_class_list($item['icon_class']) : 'fa-solid fa-circle-check';
                    $eyebrow = !empty($item['eyebrow']) ? $item['eyebrow'] : '';
                    $title = !empty($item['title']) ? $item['title'] : '';

                    if (!$eyebrow && !$title) {
                        continue;
                    }
                    ?>
                    <article class="water-trust-item">
                        <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                        <div>
                            <?php if ($eyebrow) : ?>
                                <span><?php echo esc_html($eyebrow); ?></span>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <strong><?php echo esc_html($title); ?></strong>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
