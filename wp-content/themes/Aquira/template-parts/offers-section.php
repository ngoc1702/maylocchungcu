<?php
$faq_image = hotel_landing_get_field('air_faq_image');
$faq_image_url = hotel_landing_image_url($faq_image);
$faq_title = hotel_landing_get_field('air_faq_title', hotel_landing_default('air_faq_title'));
$faq_description = hotel_landing_get_field('air_faq_description', hotel_landing_default('air_faq_description'));
$faq_items = hotel_landing_get_field('air_faq_items', hotel_landing_default('air_faq_items'));
$cta_background = hotel_landing_get_field('air_cta_background');
$cta_background_url = hotel_landing_image_url($cta_background);
$cta_title = hotel_landing_get_field('air_cta_title', hotel_landing_default('air_cta_title'));
$cta_description = hotel_landing_get_field('air_cta_description', hotel_landing_default('air_cta_description'));
$cta_button = hotel_landing_link(
    hotel_landing_get_field('air_cta_button', hotel_landing_default('air_cta_button')),
    hotel_landing_default('air_cta_button')['title'],
    hotel_landing_default('air_cta_button')['url']
);
$cta_style = $cta_background_url
    ? sprintf(' style="background-image: linear-gradient(90deg, rgba(0, 106, 117, 0.95), rgba(0, 106, 117, 0.82)), url(%s);"', esc_url($cta_background_url))
    : '';
?>

<section class="hotel-section hotel-offers air-faq" id="faq">
    <div class="hotel-container">
        <div class="air-faq__layout">
            <div class="air-faq__aside">
                <?php if ($faq_title) : ?>
                    <h2><?php echo esc_html($faq_title); ?></h2>
                <?php endif; ?>
                <?php if ($faq_description) : ?>
                    <p><?php echo esc_html($faq_description); ?></p>
                <?php endif; ?>

                <div class="air-faq__image">
                    <?php if ($faq_image_url) : ?>
                        <img src="<?php echo esc_url($faq_image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($faq_image, $faq_title)); ?>">
                    <?php else : ?>
                        <span aria-hidden="true"></span>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($faq_items) && is_array($faq_items)) : ?>
                <div class="air-faq__list">
                    <?php foreach ($faq_items as $index => $item) :
                        $question = !empty($item['question']) ? $item['question'] : '';
                        $answer = !empty($item['answer']) ? $item['answer'] : '';

                        if (!$question && !$answer) {
                            continue;
                        }
                        ?>
                        <details class="air-faq-item"<?php echo $index === 0 ? ' open' : ''; ?>>
                            <?php if ($question) : ?>
                                <summary>
                                    <?php echo esc_html($question); ?>
                                    <i class="fa-solid fa-plus" aria-hidden="true"></i>
                                </summary>
                            <?php endif; ?>
                            <?php if ($answer) : ?>
                                <p><?php echo esc_html($answer); ?></p>
                            <?php endif; ?>
                        </details>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="air-cta" id="lienhe"<?php echo $cta_style; ?>>
    <div class="hotel-container">
        <div class="air-cta__inner">
            <div>
                <?php if ($cta_title) : ?>
                    <h2><?php echo esc_html($cta_title); ?></h2>
                <?php endif; ?>
                <?php if ($cta_description) : ?>
                    <p><?php echo esc_html($cta_description); ?></p>
                <?php endif; ?>
            </div>

            <?php if (!empty($cta_button['title'])) : ?>
                <a class="air-cta__button" href="<?php echo esc_url($cta_button['url']); ?>"<?php echo $cta_button['target'] ? ' target="' . esc_attr($cta_button['target']) . '"' : ''; ?>>
                    <?php echo esc_html($cta_button['title']); ?>
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
