<?php
$testimonials_title = hotel_landing_get_field('air_testimonials_title', hotel_landing_default('air_testimonials_title'));
$testimonials_description = hotel_landing_get_field('air_testimonials_description', hotel_landing_default('air_testimonials_description'));
$testimonials = hotel_landing_get_field('air_testimonials', hotel_landing_default('air_testimonials'));
?>

<section class="hotel-section hotel-reviews air-testimonials" id="danhgia">
    <div class="hotel-container">
        <div class="hotel-section-heading air-section-heading">
            <?php if ($testimonials_title) : ?>
                <h2><?php echo esc_html($testimonials_title); ?></h2>
            <?php endif; ?>
            <?php if ($testimonials_description) : ?>
                <p class="hotel-section-heading__description"><?php echo esc_html($testimonials_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($testimonials) && is_array($testimonials)) : ?>
            <div class="air-slider-shell air-slider-shell--testimonials">
                <button class="air-slider-btn air-slider-btn--prev" type="button" data-air-slider="testimonials" data-air-dir="-1" aria-label="Đánh giá trước">
                    <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                </button>

                <div class="air-testimonial-track" data-air-track="testimonials">
                    <?php foreach ($testimonials as $testimonial) :
                        $avatar = !empty($testimonial['avatar']) ? $testimonial['avatar'] : null;
                        $avatar_url = hotel_landing_image_url($avatar);
                        $rating = !empty($testimonial['rating']) ? min(5, max(1, (int) $testimonial['rating'])) : 5;
                        $comment = !empty($testimonial['comment']) ? $testimonial['comment'] : '';
                        $name = !empty($testimonial['name']) ? $testimonial['name'] : '';
                        $location = !empty($testimonial['location']) ? $testimonial['location'] : '';

                        if (!$comment && !$name) {
                            continue;
                        }
                        ?>
                        <article class="air-testimonial-card">
                            <div class="air-stars" aria-label="<?php echo esc_attr($rating . ' sao'); ?>">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <span class="<?php echo $i <= $rating ? 'is-active' : ''; ?>">&#9733;</span>
                                <?php endfor; ?>
                            </div>

                            <?php if ($comment) : ?>
                                <blockquote><?php echo esc_html($comment); ?></blockquote>
                            <?php endif; ?>

                            <div class="air-testimonial-card__person">
                                <?php if ($avatar_url) : ?>
                                    <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($avatar, $name)); ?>">
                                <?php else : ?>
                                    <span aria-hidden="true"><?php echo esc_html(substr($name ?: 'A', 0, 1)); ?></span>
                                <?php endif; ?>
                                <div>
                                    <?php if ($name) : ?>
                                        <strong><?php echo esc_html($name); ?></strong>
                                    <?php endif; ?>
                                    <?php if ($location) : ?>
                                        <small><?php echo esc_html($location); ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <button class="air-slider-btn air-slider-btn--next" type="button" data-air-slider="testimonials" data-air-dir="1" aria-label="Đánh giá tiếp theo">
                    <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
        <?php endif; ?>
    </div>
</section>
