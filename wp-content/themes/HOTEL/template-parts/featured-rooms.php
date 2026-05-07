<?php
$rooms_title = hotel_landing_get_field('hotel_rooms_title', hotel_landing_default('hotel_rooms_title'));
$rooms = hotel_landing_get_field('hotel_rooms', hotel_landing_default('hotel_rooms'));
$rooms_button = hotel_landing_link(
    hotel_landing_get_field('hotel_rooms_button', hotel_landing_default('hotel_rooms_button')),
    hotel_landing_default('hotel_rooms_button')['title'],
    hotel_landing_default('hotel_rooms_button')['url']
);
?>

<section class="hotel-section hotel-rooms" id="hang-phong">
    <div class="hotel-container">
        <?php if ($rooms_title) : ?>
            <div class="hotel-section-heading hotel-section-heading--compact">
                <h2><?php echo esc_html($rooms_title); ?></h2>
            </div>
        <?php endif; ?>

        <?php if (!empty($rooms) && is_array($rooms)) : ?>
            <div class="hotel-rooms__list">
                <?php foreach ($rooms as $index => $room) :
                    $title = !empty($room['title']) ? $room['title'] : '';
                    $description = !empty($room['description']) ? $room['description'] : '';
                    $image = !empty($room['image']) ? $room['image'] : null;
                    $image_url = hotel_landing_image_url($image);
                    $link_default = !empty($room['link']) ? $room['link'] : array('title' => 'Khám phá chi tiết', 'url' => '#', 'target' => '');
                    $link = hotel_landing_link($link_default, 'Khám phá chi tiết', '#');
                    $image_first = $index % 2 === 1;
                    ?>
                    <article class="hotel-room-card<?php echo $image_first ? ' hotel-room-card--image-first' : ''; ?>">
                        <?php if ($image_first) : ?>
                            <div class="hotel-room-card__media">
                                <?php if ($image_url) : ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($image, $title)); ?>">
                                <?php else : ?>
                                    <span class="hotel-image-placeholder" aria-hidden="true"></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="hotel-room-card__content">
                            <?php if ($title) : ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($link['title'])) : ?>
                                <a class="hotel-text-link" href="<?php echo esc_url($link['url']); ?>"<?php echo $link['target'] ? ' target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                    <?php echo esc_html($link['title']); ?>
                                    <span aria-hidden="true">→</span>
                                </a>
                            <?php endif; ?>
                        </div>

                        <?php if (!$image_first) : ?>
                            <div class="hotel-room-card__media">
                                <?php if ($image_url) : ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($image, $title)); ?>">
                                <?php else : ?>
                                    <span class="hotel-image-placeholder" aria-hidden="true"></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($rooms_button['title'])) : ?>
            <div class="hotel-section-action">
                <a class="hotel-btn hotel-btn--gold hotel-btn--small" href="<?php echo esc_url($rooms_button['url']); ?>"<?php echo $rooms_button['target'] ? ' target="' . esc_attr($rooms_button['target']) . '"' : ''; ?>>
                    <?php echo esc_html($rooms_button['title']); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
