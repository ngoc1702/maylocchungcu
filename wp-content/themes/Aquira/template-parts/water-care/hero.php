<?php
$hero_background = aquira_landing_get_field('water_hero_background');
$hero_background_url = aquira_landing_image_url($hero_background);
$hero_background_url = $hero_background_url ?: aquira_landing_default_hero_image_url();
$hero_eyebrow = aquira_landing_get_field('water_hero_eyebrow', aquira_landing_default('water_hero_eyebrow'));
$hero_title = aquira_landing_get_field('water_hero_title', aquira_landing_default('water_hero_title'));
$hero_description = aquira_landing_get_field('water_hero_description', aquira_landing_default('water_hero_description'));
$hero_card_icon_class = aquira_landing_class_list(aquira_landing_get_field('water_hero_card_icon_class', aquira_landing_default('water_hero_card_icon_class')));
$hero_card_title = aquira_landing_get_field('water_hero_card_title', aquira_landing_default('water_hero_card_title'));
$hero_card_description = aquira_landing_get_field('water_hero_card_description', aquira_landing_default('water_hero_card_description'));
$hero_card_accent = aquira_landing_get_field('water_hero_card_accent', aquira_landing_default('water_hero_card_accent'));
$has_hero_card = $hero_card_title || $hero_card_description || $hero_card_accent;
$hero_style = $hero_background_url
    ? sprintf(
        ' style="background-image:
        linear-gradient(
            90deg,
            rgba(250, 253, 253, 0.96) 0%%,
            rgba(250, 253, 253, 0.88) 32%%,
            rgba(250, 253, 253, 0.42) 52%%,
            rgba(250, 253, 253, 0.05) 100%%
        ),
        url(%s);"',
        esc_url($hero_background_url)
    )
    : '';
?>

<section class="water-hero" id="top"<?php echo $hero_style; ?>>
    <div class="water-container water-hero__inner">
        <div class="water-hero__content">
            <?php if ($hero_eyebrow) : ?>
                <p class="water-eyebrow"><span aria-hidden="true"></span><?php echo esc_html($hero_eyebrow); ?></p>
            <?php endif; ?>

            <?php if ($hero_title) : ?>
                <h1><?php echo nl2br(esc_html($hero_title)); ?></h1>
            <?php endif; ?>

            <span class="water-hero__rule" aria-hidden="true"></span>

            <?php if ($hero_description) : ?>
                <p class="water-hero__description"><?php echo nl2br(esc_html($hero_description)); ?></p>
            <?php endif; ?>

            <?php if ($has_hero_card) : ?>
                <div class="water-hero__feature">
                    <span class="water-hero__feature-icon" aria-hidden="true">
                        <?php if ($hero_card_icon_class) : ?>
                            <i class="<?php echo esc_attr($hero_card_icon_class); ?>"></i>
                        <?php endif; ?>
                    </span>
                    <div class="water-hero__feature-copy">
                        <?php if ($hero_card_title) : ?>
                            <strong><?php echo esc_html($hero_card_title); ?></strong>
                        <?php endif; ?>
                        <?php if ($hero_card_description) : ?>
                            <span><?php echo esc_html($hero_card_description); ?></span>
                        <?php endif; ?>
                        <?php if ($hero_card_accent) : ?>
                            <em><?php echo esc_html($hero_card_accent); ?></em>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
