<?php
$logo = aquira_landing_get_field('water_logo');
$logo_url = aquira_landing_image_url($logo);
$brand_name = aquira_landing_get_field('water_brand_name', aquira_landing_default('water_brand_name'));
$nav_items = aquira_landing_get_field('water_nav_items', aquira_landing_default('water_nav_items'));
$header_button = aquira_landing_link(
    aquira_landing_get_field('water_header_button', aquira_landing_default('water_header_button')),
    aquira_landing_default('water_header_button')['title'],
    aquira_landing_default('water_header_button')['url']
);
?>

<header class="water-header" id="landing-header">
    <div class="water-container water-header__inner">
        <a class="water-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr($brand_name); ?>">
            <?php if ($logo_url) : ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(aquira_landing_image_alt($logo, $brand_name)); ?>">
            <?php else : ?>
                <span class="water-brand__mark"><i class="fa-solid fa-droplet" aria-hidden="true"></i></span>
                <span class="water-brand__name"><?php echo esc_html($brand_name); ?></span>
            <?php endif; ?>
        </a>

        <?php if (!empty($nav_items) && is_array($nav_items)) : ?>
            <nav class="water-nav" aria-label="Landing navigation">
                <?php foreach ($nav_items as $item) :
                    $label = !empty($item['label']) ? $item['label'] : '';
                    $url = !empty($item['url']) ? $item['url'] : '#';

                    if (!$label) {
                        continue;
                    }
                    ?>
                    <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>

        <?php if (!empty($header_button['title'])) : ?>
            <a class="water-header__button" href="<?php echo esc_url($header_button['url']); ?>"<?php echo $header_button['target'] ? ' target="' . esc_attr($header_button['target']) . '"' : ''; ?>>
                <?php echo esc_html($header_button['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</header>
