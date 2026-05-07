<?php
$testimonials_title = hotel_landing_get_field('hotel_testimonials_title', hotel_landing_default('hotel_testimonials_title'));
$testimonials = hotel_landing_get_field('hotel_testimonials', hotel_landing_default('hotel_testimonials'));
?>

<section class="hotel-section hotel-testimonials" id="khach-hang">
    <div class="hotel-container">
        <?php if ($testimonials_title) : ?>
            <div class="hotel-section-heading hotel-section-heading--compact">
                <h2><?php echo esc_html($testimonials_title); ?></h2>
            </div>
        <?php endif; ?>

        <?php if (!empty($testimonials) && is_array($testimonials)) : ?>
            <div class="hotel-testimonials__grid">
                <?php foreach ($testimonials as $testimonial) :
                    $avatar = !empty($testimonial['avatar']) ? $testimonial['avatar'] : null;
                    $avatar_url = hotel_landing_image_url($avatar);
                    $name = !empty($testimonial['name']) ? $testimonial['name'] : '';
                    $location = !empty($testimonial['location']) ? $testimonial['location'] : '';
                    $comment = !empty($testimonial['comment']) ? $testimonial['comment'] : '';
                    $rating = !empty($testimonial['rating']) ? min(5, max(1, (int) $testimonial['rating'])) : 5;
                    ?>
                    <article class="hotel-testimonial-card">
                        <div class="hotel-stars" aria-label="<?php echo esc_attr($rating); ?> sao">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <span class="<?php echo $i <= $rating ? 'is-active' : ''; ?>" aria-hidden="true">&#9733;</span>
                            <?php endfor; ?>
                        </div>
                        <?php if ($comment) : ?>
                            <p><?php echo esc_html($comment); ?></p>
                        <?php endif; ?>
                        <div class="hotel-testimonial-card__author">
                            <?php if ($avatar_url) : ?>
                                <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($avatar, $name)); ?>">
                            <?php else : ?>
                                <?php $initial = function_exists('mb_substr') ? mb_substr($name ?: 'G', 0, 1) : substr($name ?: 'G', 0, 1); ?>
                                <span aria-hidden="true"><?php echo esc_html($initial); ?></span>
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
            <div class="hotel-testimonials__dots" aria-hidden="true">
                <span class="is-active"></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        <?php endif; ?>
    </div>
</section>
