<?php
$process_eyebrow = aquira_landing_get_field('water_process_eyebrow', aquira_landing_default('water_process_eyebrow'));
$process_title = aquira_landing_get_field('water_process_title', aquira_landing_default('water_process_title'));
$steps = aquira_landing_get_field('water_process_steps', aquira_landing_default('water_process_steps'));
?>

<section class="water-section water-process" id="quytrinh">
    <span class="water-anchor" id="process" aria-hidden="true"></span>
    <div class="water-container">
        <?php if ($process_eyebrow || $process_title) : ?>
            <div class="water-section-heading">
                <?php if ($process_eyebrow) : ?>
                    <p class="water-section-heading__eyebrow"><?php echo esc_html($process_eyebrow); ?></p>
                <?php endif; ?>
                <?php if ($process_title) : ?>
                    <h2><?php echo esc_html($process_title); ?></h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($steps) && is_array($steps)) : ?>
            <div class="water-process__timeline">
                <?php foreach ($steps as $step) :
                    $number = !empty($step['number']) ? $step['number'] : '';
                    $title = !empty($step['title']) ? $step['title'] : '';
                    $description = !empty($step['description']) ? $step['description'] : '';

                    if (!$title && !$description) {
                        continue;
                    }
                    ?>
                    <article class="water-process-step">
                        <?php if ($number) : ?>
                            <span class="water-process-step__number"><?php echo esc_html($number); ?></span>
                        <?php endif; ?>
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
