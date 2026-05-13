<?php
$rooms_eyebrow = hotel_landing_get_field('hotel_rooms_eyebrow', hotel_landing_default('hotel_rooms_eyebrow'));
$rooms_title = hotel_landing_get_field('hotel_rooms_title', hotel_landing_default('hotel_rooms_title'));
$rooms_description = hotel_landing_get_field('hotel_rooms_description', hotel_landing_default('hotel_rooms_description'));
$rooms = hotel_landing_get_field('hotel_rooms', hotel_landing_default('hotel_rooms'));
$booking_button = hotel_landing_link(
    hotel_landing_get_field('hotel_room_booking_button', hotel_landing_default('hotel_room_booking_button')),
    hotel_landing_default('hotel_room_booking_button')['title'],
    hotel_landing_default('hotel_room_booking_button')['url']
);

$rooms = (!empty($rooms) && is_array($rooms)) ? $rooms : array();
?>

<section class="hotel-section hotel-rooms" id="hangphong">
    <div class="hotel-container">
        <div class="hotel-section-heading hotel-section-heading--rooms">
            <?php if ($rooms_eyebrow) : ?>
                <p class="hotel-eyebrow"><?php echo esc_html($rooms_eyebrow); ?></p>
            <?php endif; ?>
            <?php if ($rooms_title) : ?>
                <h2><?php echo esc_html($rooms_title); ?></h2>
            <?php endif; ?>
            <?php if ($rooms_description) : ?>
                <p class="hotel-section-heading__description"><?php echo esc_html($rooms_description); ?></p>
            <?php endif; ?>
        </div>

        <div class="hotel-room-showcase">
            <?php foreach ($rooms as $room) :
                $room_title = !empty($room['title']) ? $room['title'] : '';
                $room_description = !empty($room['description']) ? $room['description'] : '';
                $room_guest_count = !empty($room['guest_count']) ? $room['guest_count'] : '';
                $room_image = !empty($room['image']) ? $room['image'] : null;
                $room_image_url = hotel_landing_image_url($room_image);
                $room_button = !empty($room['link'])
                    ? hotel_landing_link($room['link'], $booking_button['title'], $booking_button['url'])
                    : $booking_button;
                $room_facts = !empty($room['facts']) && is_array($room['facts']) ? $room['facts'] : hotel_landing_default('hotel_room_facts');
                ?>
                <article class="hotel-room-card">
                    <div class="hotel-room-card__content">
                        <?php if ($room_title) : ?>
                            <h3><?php echo esc_html($room_title); ?></h3>
                        <?php endif; ?>

                        <?php if ($room_description) : ?>
                            <p><?php echo esc_html($room_description); ?></p>
                        <?php endif; ?>

                        <?php if ($room_guest_count) : ?>
                            <div class="hotel-room-card__guests">
                                <i class="fa-solid fa-user-group" aria-hidden="true"></i>
                                <span><?php echo esc_html($room_guest_count); ?></span>
                            </div>
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
                            <?php if (!empty($room_button['title'])) : ?>
                                <a class="hotel-btn hotel-btn--gold hotel-btn--small" href="<?php echo esc_url($room_button['url']); ?>"<?php echo $room_button['target'] ? ' target="' . esc_attr($room_button['target']) . '"' : ''; ?>>
                                    <?php echo esc_html($room_button['title']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 18 12" fill="none"><path d="M-2.18557e-07 6L15.6008 6.00004M11.0001 1L16 6.00004L11 11" stroke="white" stroke-width="1.5"></path></svg>
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
            <?php endforeach; ?>
        </div>
    </div>
</section>
