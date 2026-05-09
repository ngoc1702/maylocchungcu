<?php
$intro_eyebrow = hotel_landing_get_field('hotel_intro_eyebrow', hotel_landing_default('hotel_intro_eyebrow'));
$intro_title = hotel_landing_get_field('hotel_intro_title', hotel_landing_default('hotel_intro_title'));
$intro_description = hotel_landing_get_field('hotel_intro_description', hotel_landing_default('hotel_intro_description'));
$intro_button = hotel_landing_link(
    hotel_landing_get_field('hotel_intro_button', hotel_landing_default('hotel_intro_button')),
    hotel_landing_default('hotel_intro_button')['title'],
    hotel_landing_default('hotel_intro_button')['url']
);
$intro_images = hotel_landing_get_field('hotel_intro_images', hotel_landing_default('hotel_intro_images'));
$intro_reviews = hotel_landing_get_field('hotel_intro_reviews', hotel_landing_default('hotel_intro_reviews'));
$rooms = hotel_landing_get_field('hotel_rooms', hotel_landing_default('hotel_rooms'));

$intro_image_items = array();
if (!empty($intro_images) && is_array($intro_images)) {
    foreach ($intro_images as $item) {
        $image = is_array($item) && array_key_exists('image', $item) ? $item['image'] : $item;
        $image_url = hotel_landing_image_url($image);

        if ($image_url) {
            $intro_image_items[] = array(
                'url' => $image_url,
                'alt' => hotel_landing_image_alt($image, $intro_title),
            );
        }
    }
}

if (empty($intro_image_items) && !empty($rooms) && is_array($rooms)) {
    foreach ($rooms as $room) {
        if (empty($room['image'])) {
            continue;
        }

        $image_url = hotel_landing_image_url($room['image']);
        if ($image_url) {
            $intro_image_items[] = array(
                'url' => $image_url,
                'alt' => hotel_landing_image_alt($room['image'], !empty($room['title']) ? $room['title'] : $intro_title),
            );
        }
    }
}
?>

<section class="hotel-section hotel-intro" id="gioi-thieu">
    <div class="hotel-container">
        <div class="hotel-intro__layout">
            <div class="hotel-intro__media" aria-label="Hotel interior gallery">
                <?php for ($index = 0; $index < 2; $index++) : ?>
                    <?php if (!empty($intro_image_items[$index]['url'])) : ?>
                        <figure class="hotel-intro__image">
                            <img src="<?php echo esc_url($intro_image_items[$index]['url']); ?>" alt="<?php echo esc_attr($intro_image_items[$index]['alt']); ?>">
                        </figure>
                    <?php else : ?>
                        <figure class="hotel-intro__image hotel-intro__image--placeholder" aria-hidden="true"></figure>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>

            <div class="hotel-intro__content">
                <?php if ($intro_eyebrow) : ?>
                    <p class="hotel-eyebrow"><?php echo esc_html($intro_eyebrow); ?></p>
                <?php endif; ?>

                <?php if ($intro_title) : ?>
                    <h2><?php echo esc_html($intro_title); ?></h2>
                <?php endif; ?>

                <?php if ($intro_description) : ?>
                    <p><?php echo esc_html($intro_description); ?></p>
                <?php endif; ?>

                <?php if (!empty($intro_button['title'])) : ?>
                    <a class="hotel-btn hotel-btn--gold hotel-btn--small" href="<?php echo esc_url($intro_button['url']); ?>"<?php echo $intro_button['target'] ? ' target="' . esc_attr($intro_button['target']) . '"' : ''; ?>>
                        <?php echo esc_html($intro_button['title']); ?>
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($intro_reviews) && is_array($intro_reviews)) : ?>
            <div class="hotel-review-strip" aria-label="Review summaries">
                <?php foreach ($intro_reviews as $review) :
                    $logo = !empty($review['logo']) ? $review['logo'] : null;
                    $logo_url = hotel_landing_image_url($logo);
                    $logo_text = !empty($review['logo_text']) ? $review['logo_text'] : '';
                    $rating = !empty($review['rating']) ? $review['rating'] : '';
                    $label = !empty($review['label']) ? $review['label'] : '';
                    $description = !empty($review['description']) ? $review['description'] : '';
                    ?>
                    <article class="hotel-review-summary">
                        <div class="hotel-review-summary__logo">
                            <?php if ($logo_url) : ?>
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($logo, $logo_text)); ?>">
                            <?php else : ?>
                                <span><?php echo esc_html($logo_text); ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php if ($rating || $label) : ?>
                                <strong>
                                    <?php echo esc_html($rating); ?>
                                    <?php if ($label) : ?>
                                        <span>&#9733; <?php echo esc_html($label); ?></span>
                                    <?php endif; ?>
                                </strong>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
