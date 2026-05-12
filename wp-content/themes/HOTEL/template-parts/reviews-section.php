<?php
$reviews_eyebrow = hotel_landing_get_field('hotel_reviews_eyebrow', hotel_landing_default('hotel_reviews_eyebrow'));
$reviews_title = hotel_landing_get_field('hotel_reviews_title', hotel_landing_default('hotel_reviews_title'));
$reviews_description = hotel_landing_get_field('hotel_reviews_description', hotel_landing_default('hotel_reviews_description'));
$reviews = hotel_landing_get_field('hotel_intro_reviews', hotel_landing_default('hotel_intro_reviews'));
?>

<section class="hotel-section hotel-reviews" id="danh-gia">
    <div class="hotel-container">
           <div class="hotel-section-heading hotel-section-heading--offers">
        <?php if ($reviews_eyebrow) : ?>
             <p class="hotel-eyebrow"><?php echo esc_html($reviews_eyebrow); ?></p>
        <?php endif; ?>
        <?php if ($reviews_title) : ?>
            <div class="hotel-section-heading hotel-section-heading--reviews">
                <h2><?php echo esc_html($reviews_title); ?></h2>
            </div>
        <?php endif; ?>
        <?php if ($reviews_description) : ?>
            <p class="hotel-description"><?php echo esc_html($reviews_description); ?></p>
        <?php endif; ?>
        </div>

        <?php if (!empty($reviews) && is_array($reviews)) : ?>
            <div class="hotel-review-strip" aria-label="<?php echo esc_attr($reviews_title ?: 'Review summaries'); ?>">
                <?php foreach ($reviews as $review) :
                    $logo = !empty($review['logo']) ? $review['logo'] : null;
                    $logo_url = hotel_landing_image_url($logo);
                    $logo_text = !empty($review['logo_text']) ? $review['logo_text'] : '';
                    $rating = !empty($review['rating']) ? $review['rating'] : '';
                    $label = !empty($review['label']) ? $review['label'] : '';
                    $description = !empty($review['description']) ? $review['description'] : '';
                    $url = !empty($review['url']) ? $review['url'] : '';
                    $tag = $url ? 'a' : 'article';
                    ?>
                    <<?php echo $tag; ?> class="hotel-review-summary"<?php echo $url ? ' href="' . esc_url($url) . '"' : ''; ?>>
                        <span class="hotel-review-summary__logo">
                            <?php if ($logo_url) : ?>
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($logo, $logo_text)); ?>">
                            <?php else : ?>
                                <span><?php echo esc_html($logo_text); ?></span>
                            <?php endif; ?>
                        </span>
                        <span class="hotel-review-summary__content">
                            <?php if ($rating || $label) : ?>
                                <strong>
                                    <?php echo esc_html($rating); ?>
                                    <?php if ($label) : ?>
                                        <span>&#9733; <?php echo esc_html($label); ?></span>
                                    <?php endif; ?>
                                </strong>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <small><?php echo esc_html($description); ?></small>
                            <?php endif; ?>
                        </span>
                    </<?php echo $tag; ?>>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
