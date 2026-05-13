<?php
$products_title = hotel_landing_get_field('air_products_title', hotel_landing_default('air_products_title'));
$products_description = hotel_landing_get_field('air_products_description', hotel_landing_default('air_products_description'));
$products = hotel_landing_get_field('air_products', hotel_landing_default('air_products'));
$products = (!empty($products) && is_array($products)) ? $products : array();
?>

<section class="hotel-section hotel-rooms air-products" id="sanpham">
    <div class="hotel-container">
        <div class="hotel-section-heading air-section-heading">
            <?php if ($products_title) : ?>
                <h2><?php echo esc_html($products_title); ?></h2>
            <?php endif; ?>
            <?php if ($products_description) : ?>
                <p class="hotel-section-heading__description"><?php echo esc_html($products_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($products)) : ?>
            <div class="air-slider-shell">
                <button class="air-slider-btn air-slider-btn--prev" type="button" data-air-slider="products" data-air-dir="-1" aria-label="Sản phẩm trước">
                    <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                </button>

                <div class="air-product-track" data-air-track="products">
                    <?php foreach ($products as $index => $product) :
                        $title = !empty($product['title']) ? $product['title'] : '';
                        $description = !empty($product['description']) ? $product['description'] : '';
                        $price = !empty($product['price']) ? $product['price'] : '';
                        $rating = !empty($product['rating']) ? min(5, max(1, (int) $product['rating'])) : 5;
                        $image = !empty($product['image']) ? $product['image'] : null;
                        $image_url = hotel_landing_image_url($image);
                        $facts = !empty($product['facts']) && is_array($product['facts']) ? $product['facts'] : array();
                        $link = hotel_landing_link(!empty($product['link']) ? $product['link'] : null, 'Xem chi tiết', '#consult');

                        if (!$title && !$description) {
                            continue;
                        }
                        ?>
                        <article class="air-product-card">
                            <div class="air-product-card__media">
                                <?php if ($image_url) : ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($image, $title)); ?>">
                                <?php else : ?>
                                    <span class="air-product-placeholder air-product-placeholder--<?php echo esc_attr(($index % 3) + 1); ?>" aria-hidden="true"></span>
                                <?php endif; ?>
                            </div>

                            <div class="air-product-card__body">
                                <?php if ($title) : ?>
                                    <h3><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>

                                <div class="air-stars" aria-label="<?php echo esc_attr($rating . ' sao'); ?>">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <span class="<?php echo $i <= $rating ? 'is-active' : ''; ?>">&#9733;</span>
                                    <?php endfor; ?>
                                </div>

                                <?php if ($description) : ?>
                                    <p><?php echo esc_html($description); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($facts)) : ?>
                                    <ul class="air-product-card__facts">
                                        <?php foreach (array_slice($facts, 0, 2) as $fact) :
                                            $fact_label = !empty($fact['label']) ? $fact['label'] : '';
                                            $fact_icon = !empty($fact['icon_class']) ? hotel_landing_class_list($fact['icon_class']) : 'fa-regular fa-circle-check';

                                            if (!$fact_label) {
                                                continue;
                                            }
                                            ?>
                                            <li>
                                                <i class="<?php echo esc_attr($fact_icon); ?>" aria-hidden="true"></i>
                                                <?php echo esc_html($fact_label); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($price) : ?>
                                    <strong class="air-product-card__price"><?php echo esc_html($price); ?></strong>
                                <?php endif; ?>

                                <?php if (!empty($link['title'])) : ?>
                                    <a class="air-outline-btn" href="<?php echo esc_url($link['url']); ?>"<?php echo $link['target'] ? ' target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <button class="air-slider-btn air-slider-btn--next" type="button" data-air-slider="products" data-air-dir="1" aria-label="Sản phẩm tiếp theo">
                    <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
        <?php endif; ?>
    </div>
</section>
