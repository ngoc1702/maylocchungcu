<?php
$rooms_eyebrow = hotel_landing_get_field('hotel_rooms_eyebrow', hotel_landing_default('hotel_rooms_eyebrow'));
$rooms_title = hotel_landing_get_field('hotel_rooms_title', hotel_landing_default('hotel_rooms_title'));
$rooms = hotel_landing_get_field('hotel_rooms', hotel_landing_default('hotel_rooms'));
$booking_button = hotel_landing_link(
    hotel_landing_get_field('hotel_room_booking_button', hotel_landing_default('hotel_room_booking_button')),
    hotel_landing_default('hotel_room_booking_button')['title'],
    hotel_landing_default('hotel_room_booking_button')['url']
);

$room = (!empty($rooms) && is_array($rooms)) ? reset($rooms) : array();
$room_title = !empty($room['title']) ? $room['title'] : '';
$room_description = !empty($room['description']) ? $room['description'] : '';
$room_image = !empty($room['image']) ? $room['image'] : null;
$room_image_url = hotel_landing_image_url($room_image);
$room_link = hotel_landing_link(!empty($room['link']) ? $room['link'] : null, 'View room', '#');
$room_price = !empty($room['price']) ? $room['price'] : hotel_landing_default('hotel_room_price');
$room_price_note = !empty($room['price_note']) ? $room['price_note'] : hotel_landing_default('hotel_room_price_note');
$room_facts = !empty($room['facts']) && is_array($room['facts']) ? $room['facts'] : hotel_landing_default('hotel_room_facts');
?>

<section class="hotel-section hotel-rooms" id="hang-phong">
    <div class="hotel-container">
        <div class="hotel-section-heading hotel-section-heading--rooms">
            <?php if ($rooms_eyebrow) : ?>
                <p class="hotel-eyebrow"><?php echo esc_html($rooms_eyebrow); ?></p>
            <?php endif; ?>
            <?php if ($rooms_title) : ?>
                <h2><?php echo esc_html($rooms_title); ?></h2>
            <?php endif; ?>
        </div>

        <div class="hotel-room-showcase">
            <button class="hotel-room-showcase__arrow hotel-room-showcase__arrow--prev" type="button" aria-label="Previous room">
                <span aria-hidden="true">&lsaquo;</span>
            </button>

            <article class="hotel-room-card">
                <div class="hotel-room-card__content">
                    <?php if ($room_price) : ?>
                        <div class="hotel-room-card__price">
                            <span>From:</span>
                            <strong>$<?php echo esc_html($room_price); ?></strong>
                            <?php if ($room_price_note) : ?>
                                <small><?php echo esc_html($room_price_note); ?></small>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($room_title) : ?>
                        <h3><?php echo esc_html($room_title); ?></h3>
                    <?php endif; ?>

                    <?php if ($room_description) : ?>
                        <p><?php echo esc_html($room_description); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($room_facts) && is_array($room_facts)) : ?>
                        <ul class="hotel-room-card__facts">
                            <?php foreach ($room_facts as $fact) :
                                $label = !empty($fact['label']) ? $fact['label'] : '';
                                $icon_class = !empty($fact['icon_class']) ? hotel_landing_class_list($fact['icon_class']) : 'fa-regular fa-circle-check';

                                if (!$label) {
                                    continue;
                                }
                                ?>
                                <li>
                                    <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                                    <?php echo esc_html($label); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="hotel-room-card__actions">
                        <?php if (!empty($booking_button['title'])) : ?>
                            <a class="hotel-btn hotel-btn--gold hotel-btn--small" href="<?php echo esc_url($booking_button['url']); ?>"<?php echo $booking_button['target'] ? ' target="' . esc_attr($booking_button['target']) . '"' : ''; ?>>
                                <i class="fa-regular fa-calendar-check" aria-hidden="true"></i>
                                <?php echo esc_html($booking_button['title']); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($room_link['title'])) : ?>
                            <a class="hotel-btn hotel-btn--outline hotel-btn--small" href="<?php echo esc_url($room_link['url']); ?>"<?php echo $room_link['target'] ? ' target="' . esc_attr($room_link['target']) . '"' : ''; ?>>
                                <?php echo esc_html($room_link['title']); ?>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="hotel-room-card__media">
                    <?php if ($room_image_url) : ?>
                        <img src="<?php echo esc_url($room_image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($room_image, $room_title)); ?>">
                    <?php else : ?>
                        <span class="hotel-image-placeholder" aria-hidden="true"></span>
                    <?php endif; ?>
                </div>
            </article>

            <button class="hotel-room-showcase__arrow hotel-room-showcase__arrow--next" type="button" aria-label="Next room">
                <span aria-hidden="true">&rsaquo;</span>
            </button>
        </div>
    </div>
</section>
