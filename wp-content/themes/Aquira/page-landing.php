<?php
/*
Template Name: Landing Page
*/

add_filter( 'genesis_site_layout', 'caia_landing_layout' );
function caia_landing_layout() {
    return 'full-width-content';
}

add_filter( 'body_class', 'aquira_water_care_landing_body_class' );
function aquira_water_care_landing_body_class( $classes ) {
    $classes[] = 'aquira-water-care-template';
    return $classes;
}

// Keep this landing page standalone from the default Genesis shell.
remove_all_actions( 'genesis_before_header' );
remove_all_actions( 'genesis_header' );
remove_all_actions( 'genesis_before_footer' );
remove_all_actions( 'genesis_footer' );
remove_all_actions( 'genesis_after_footer' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_after_header', 'caia_add_page_landing' );
function caia_add_page_landing() {
    ?>
    <main id="main-landing" class="landing-page water-care-landing">
        <?php aquira_water_care_landing_render_parts(); ?>
    </main>
    <?php
}

genesis();
