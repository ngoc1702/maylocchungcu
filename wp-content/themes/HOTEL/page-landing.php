<?php
/*
Template Name: Landing Page
*/

add_filter( 'genesis_site_layout', 'caia_landing_layout' );
function caia_landing_layout() {
    return 'full-width-content';
}

// Xóa post-info và post-meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// Xóa loop mặc định
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Xóa section trước footer nếu không muốn hiện
remove_action( 'genesis_before_footer', 'caia_add_content_after_footer', 8 );

// Thêm layout landing vào genesis_after_header
add_action( 'genesis_after_header', 'caia_add_page_landing');
function caia_add_page_landing() {
    ?>
    <main id="main-landing" class="landing-page hotel-landing">
        <?php hotel_landing_render_parts(); ?>
    </main>
    <?php
}

genesis();
