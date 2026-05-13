<?php
$hero_background = aquira_landing_get_field('water_hero_background');
$hero_background_url = aquira_landing_image_url($hero_background);
$hero_background_url = $hero_background_url ?: aquira_landing_default_hero_image_url();
$hero_eyebrow = aquira_landing_get_field('water_hero_eyebrow', aquira_landing_default('water_hero_eyebrow'));
$hero_title = aquira_landing_get_field('water_hero_title', aquira_landing_default('water_hero_title'));
$hero_description = aquira_landing_get_field('water_hero_description', aquira_landing_default('water_hero_description'));
$hero_style = $hero_background_url
    ? sprintf(
        ' style="background-image:
        linear-gradient(
            90deg,
            rgba(15, 76, 129, 0.58) 0%%,
            rgba(37, 99, 160, 0.34) 45%%,
            rgba(125, 211, 252, 0.08) 100%%
        ),
        url(%s);"',
        esc_url($hero_background_url)
    )
    : '';
?>

<section class="water-hero" id="top"<?php echo $hero_style; ?>>
    <div class="water-container water-hero__inner">
        <?php if ($hero_eyebrow) : ?>
            <p class="water-eyebrow"><span aria-hidden="true"></span><?php echo esc_html($hero_eyebrow); ?></p>
        <?php endif; ?>

        <?php if ($hero_title) : ?>
            <h1><?php echo nl2br(esc_html($hero_title)); ?></h1>
        <?php endif; ?>

        <?php if ($hero_description) : ?>
            <div class="water-hero__note">
                <p><?php echo esc_html($hero_description); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
