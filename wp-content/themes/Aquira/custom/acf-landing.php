<?php

/**
 * Air purifier landing page ACF configuration and rendering helpers.
 * Location: /custom/acf-landing.php
 */

if (!function_exists('hotel_landing_has_value')) {
    function hotel_landing_has_value($value)
    {
        return !($value === null || $value === false || $value === '' || (is_array($value) && empty($value)));
    }
}

if (!function_exists('hotel_landing_default')) {
    function hotel_landing_default($key)
    {
        static $defaults = null;

        if ($defaults === null) {
            $defaults = array(
                'air_brand_name' => 'AUIRA',
                'air_brand_subtitle' => 'Clean Air Systems',
                'air_header_button' => array('title' => 'Liên hệ', 'url' => '#consult', 'target' => ''),
                'air_nav_items' => array(
                    array('label' => 'Sản phẩm', 'url' => '#sanpham'),
                    array('label' => 'Giải pháp', 'url' => '#giaiphap'),
                    array('label' => 'Về Auira', 'url' => '#ve-auira'),
                    array('label' => 'Tin tức', 'url' => '#tin-tuc'),
                ),

                'air_hero_title' => "Máy lọc không khí Auira\nBảo vệ toàn diện cho căn hộ của bạn",
                'air_hero_subtitle' => 'Không khí sạch cho sức khỏe và chất lượng sống mỗi ngày.',
                'air_hero_description' => 'Giải pháp lọc không khí trung tâm cho căn hộ chung cư, giúp giảm bụi mịn, mùi khó chịu và tác nhân gây dị ứng.',
                'air_hero_button' => array('title' => 'Nhận tư vấn ngay', 'url' => '#consult', 'target' => ''),
                'air_hero_badges' => array(
                    array('label' => 'PM2.5', 'value' => 'Giảm bụi mịn'),
                    array('label' => 'HEPA H13', 'value' => 'Màng lọc chuẩn cao'),
                    array('label' => '24/7', 'value' => 'Vận hành êm ái'),
                ),

                'air_form_title' => 'Nhận tư vấn giải pháp lọc không khí phù hợp',
                'air_form_description' => 'Đội ngũ tư vấn Auira hỗ trợ bạn chọn cấu hình đúng nhu cầu.',
                'air_form_shortcode' => '',
                'air_form_action' => '#',
                'air_form_name_placeholder' => 'Họ và tên',
                'air_form_phone_placeholder' => 'Số điện thoại',
                'air_form_location_placeholder' => 'Chọn tỉnh / thành phố',
                'air_form_submit_text' => 'Nhận tư vấn ngay',
                'air_form_privacy_text' => 'Thông tin của bạn được bảo mật tuyệt đối',

                'air_products_title' => 'Sản phẩm máy lọc không khí Auira nổi bật',
                'air_products_description' => 'Giải pháp tối ưu cho không khí sạch và an toàn trong căn hộ.',
                'air_products' => array(
                    array(
                        'title' => 'Auira Pure One',
                        'description' => 'Máy lọc không khí nhỏ gọn cho phòng ngủ và phòng làm việc.',
                        'price' => '12.900.000 đ',
                        'rating' => 5,
                        'link' => array('title' => 'Xem chi tiết', 'url' => '#consult', 'target' => ''),
                        'facts' => array(
                            array('icon_class' => 'fa-solid fa-wind', 'label' => 'Phòng 25-35 m2'),
                            array('icon_class' => 'fa-solid fa-volume-low', 'label' => 'Độ ồn thấp'),
                        ),
                    ),
                    array(
                        'title' => 'Auira Pure Max',
                        'description' => 'Công suất mạnh cho phòng khách và không gian sinh hoạt chung.',
                        'price' => '18.500.000 đ',
                        'rating' => 5,
                        'link' => array('title' => 'Xem chi tiết', 'url' => '#consult', 'target' => ''),
                        'facts' => array(
                            array('icon_class' => 'fa-solid fa-house-chimney-window', 'label' => 'Phòng 45-60 m2'),
                            array('icon_class' => 'fa-solid fa-gauge-high', 'label' => 'Cảm biến tự động'),
                        ),
                    ),
                    array(
                        'title' => 'Auira Central Air',
                        'description' => 'Giải pháp lọc không khí tổng cho căn hộ cao cấp.',
                        'price' => 'Liên hệ',
                        'rating' => 5,
                        'link' => array('title' => 'Xem chi tiết', 'url' => '#consult', 'target' => ''),
                        'facts' => array(
                            array('icon_class' => 'fa-solid fa-building', 'label' => 'Lắp đặt âm trần'),
                            array('icon_class' => 'fa-solid fa-shield-heart', 'label' => 'Bảo vệ toàn căn hộ'),
                        ),
                    ),
                ),

                'air_intro_eyebrow' => 'Về Auira',
                'air_intro_title' => 'Giải pháp lọc không khí toàn diện chuẩn châu Âu cho mọi gia đình',
                'air_intro_description' => 'Auira tập trung vào các hệ thống lọc không khí cho căn hộ đô thị. Công nghệ lọc đa tầng kết hợp cảm biến thông minh giúp duy trì không gian trong lành, hạn chế bụi mịn, mùi nấu ăn và phấn hoa trong sinh hoạt hằng ngày.',
                'air_intro_button' => array('title' => 'Tìm hiểu thêm', 'url' => '#ve-auira', 'target' => ''),

                'air_certifications_title' => 'Giải thưởng & chứng nhận',
                'air_certifications_description' => 'Nỗ lực không ngừng vì chất lượng và sự tin cậy.',
                'air_certifications' => array(
                    array('icon_class' => 'fa-solid fa-award', 'title' => 'Red Dot Design', 'description' => 'Winner 2023'),
                    array('icon_class' => 'fa-solid fa-medal', 'title' => 'German Design', 'description' => 'Award 2023'),
                    array('icon_class' => 'fa-solid fa-leaf', 'title' => 'Energy Star', 'description' => 'Efficient Certified'),
                    array('icon_class' => 'fa-solid fa-certificate', 'title' => 'ISO 9001:2015', 'description' => 'Quality Certified'),
                ),

                'air_features_title' => 'Ưu điểm vượt trội của máy lọc không khí Auira',
                'air_features_description' => 'Tối ưu cho nhịp sống chung cư và gia đình có trẻ nhỏ.',
                'air_features' => array(
                    array('icon_class' => 'fa-solid fa-droplet', 'title' => 'Không khí sạch toàn diện', 'description' => 'Giảm bụi mịn, phấn hoa, mùi và tác nhân gây dị ứng.'),
                    array('icon_class' => 'fa-solid fa-shield-heart', 'title' => 'Bảo vệ sức khỏe', 'description' => 'Hỗ trợ môi trường sống trong lành cho cả gia đình.'),
                    array('icon_class' => 'fa-solid fa-microchip', 'title' => 'Cảm biến thông minh', 'description' => 'Tự điều chỉnh công suất theo chất lượng không khí.'),
                    array('icon_class' => 'fa-solid fa-wave-square', 'title' => 'Vận hành êm ái', 'description' => 'Độ ồn thấp, phù hợp phòng ngủ và phòng làm việc.'),
                    array('icon_class' => 'fa-solid fa-circle-check', 'title' => 'An tâm dài lâu', 'description' => 'Bảo hành rõ ràng, bảo trì và thay lõi thuận tiện.'),
                ),

                'air_testimonials_title' => 'Khách hàng nói về Auira',
                'air_testimonials_description' => 'Những phản hồi thực tế sau khi lắp đặt tại căn hộ.',
                'air_testimonials' => array(
                    array('rating' => 5, 'comment' => 'Từ ngày lắp Auira, bụi trong nhà giảm rõ, phòng ngủ dễ chịu hơn hẳn.', 'name' => 'Anh Minh', 'location' => 'Sun Grand City, Hà Nội'),
                    array('rating' => 5, 'comment' => 'Thiết bị nhỏ gọn, chạy êm, nhân viên tư vấn cấu hình rất kỹ.', 'name' => 'Chị Hương', 'location' => 'Vinhomes Central Park, TP.HCM'),
                    array('rating' => 5, 'comment' => 'Đội lắp đặt nhanh, gọn, không ảnh hưởng nội thất căn hộ.', 'name' => 'Anh Tuấn', 'location' => 'RiverGate Residence, TP.HCM'),
                ),

                'air_faq_title' => 'Câu hỏi thường gặp',
                'air_faq_description' => 'Thông tin nhanh trước khi lựa chọn giải pháp lọc không khí.',
                'air_faq_items' => array(
                    array('question' => 'Máy lọc không khí Auira có phù hợp với căn hộ chung cư không?', 'answer' => 'Có. Auira có nhiều cấu hình cho phòng ngủ, phòng khách và giải pháp tổng cho căn hộ, phù hợp với không gian đô thị.'),
                    array('question' => 'Bao lâu cần thay màng lọc một lần?', 'answer' => 'Tùy mức sử dụng và chất lượng không khí, thông thường màng lọc nên được kiểm tra sau 6-12 tháng.'),
                    array('question' => 'Chi phí lắp đặt và vận hành như thế nào?', 'answer' => 'Chi phí phụ thuộc diện tích, cấu hình thiết bị và phương án lắp đặt. Đội tư vấn sẽ khảo sát nhu cầu trước khi báo giá.'),
                    array('question' => 'Thời gian lắp đặt mất bao lâu?', 'answer' => 'Các mẫu độc lập có thể bàn giao nhanh trong ngày. Giải pháp tổng cần khảo sát và lên phương án thi công cụ thể.'),
                ),

                'air_cta_title' => 'Sẵn sàng nâng cấp không khí cho căn hộ của bạn?',
                'air_cta_description' => 'Auira luôn sẵn sàng tư vấn giải pháp tối ưu nhất cho gia đình bạn.',
                'air_cta_button' => array('title' => 'Nhận tư vấn ngay', 'url' => '#consult', 'target' => ''),

                'air_footer_description' => 'Giải pháp lọc không khí thông minh cho chung cư và căn hộ gia đình.',
                'air_footer_product_links' => array(
                    array('label' => 'Auira Pure One', 'url' => '#sanpham'),
                    array('label' => 'Auira Pure Max', 'url' => '#sanpham'),
                    array('label' => 'Auira Central Air', 'url' => '#sanpham'),
                    array('label' => 'Phụ kiện & màng lọc', 'url' => '#sanpham'),
                ),
                'air_footer_solution_links' => array(
                    array('label' => 'Cho căn hộ chung cư', 'url' => '#giaiphap'),
                    array('label' => 'Cho nhà phố', 'url' => '#giaiphap'),
                    array('label' => 'Cho biệt thự', 'url' => '#giaiphap'),
                ),
                'air_footer_about_links' => array(
                    array('label' => 'Giới thiệu', 'url' => '#ve-auira'),
                    array('label' => 'Tin tức', 'url' => '#tin-tuc'),
                    array('label' => 'Liên hệ', 'url' => '#lienhe'),
                ),
                'air_footer_contacts' => array(
                    array('icon_class' => 'fa-solid fa-phone', 'text' => '1800 800 999', 'url' => 'tel:1800800999'),
                    array('icon_class' => 'fa-solid fa-envelope', 'text' => 'info@auira.vn', 'url' => 'mailto:info@auira.vn'),
                    array('icon_class' => 'fa-solid fa-globe', 'text' => 'auira.vn', 'url' => '#'),
                ),
                'air_footer_socials' => array(
                    array('label' => 'Facebook', 'icon_class' => 'fa-brands fa-facebook-f', 'url' => '#'),
                    array('label' => 'Instagram', 'icon_class' => 'fa-brands fa-instagram', 'url' => '#'),
                    array('label' => 'YouTube', 'icon_class' => 'fa-brands fa-youtube', 'url' => '#'),
                ),
                'air_copyright' => '© 2026 Auira. All rights reserved.',
            );
        }

        return array_key_exists($key, $defaults) ? $defaults[$key] : null;
    }
}

if (!function_exists('hotel_landing_get_field')) {
    function hotel_landing_get_field($name, $default = null)
    {
        if (!function_exists('get_field')) {
            return $default;
        }

        $value = get_field($name);

        if (hotel_landing_has_value($value)) {
            return $value;
        }

        $option_value = get_field($name, 'option');

        return hotel_landing_has_value($option_value) ? $option_value : $default;
    }
}

if (!function_exists('hotel_landing_image_url')) {
    function hotel_landing_image_url($image, $size = 'full')
    {
        if (is_array($image) && !empty($image['sizes'][$size])) {
            return $image['sizes'][$size];
        }

        if (is_array($image) && !empty($image['url'])) {
            return $image['url'];
        }

        if (is_numeric($image)) {
            return wp_get_attachment_image_url($image, $size);
        }

        return is_string($image) ? $image : '';
    }
}

if (!function_exists('hotel_landing_image_alt')) {
    function hotel_landing_image_alt($image, $fallback = '')
    {
        if (is_array($image) && !empty($image['alt'])) {
            return $image['alt'];
        }

        if (is_array($image) && !empty($image['title'])) {
            return $image['title'];
        }

        return $fallback;
    }
}

if (!function_exists('hotel_landing_link')) {
    function hotel_landing_link($link, $default_title = '', $default_url = '#')
    {
        if (is_array($link)) {
            return array(
                'title' => !empty($link['title']) ? $link['title'] : $default_title,
                'url' => !empty($link['url']) ? $link['url'] : $default_url,
                'target' => !empty($link['target']) ? $link['target'] : '',
            );
        }

        if (is_string($link) && $link !== '') {
            return array('title' => $default_title, 'url' => $link, 'target' => '');
        }

        return array('title' => $default_title, 'url' => $default_url, 'target' => '');
    }
}

if (!function_exists('hotel_landing_class_list')) {
    function hotel_landing_class_list($classes)
    {
        return trim(preg_replace('/[^A-Za-z0-9_\-\s]/', '', (string) $classes));
    }
}

if (!function_exists('hotel_landing_acf_locations')) {
    function hotel_landing_acf_locations()
    {
        $locations = array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-landing.php',
                ),
            ),
        );

        if (function_exists('acf_add_options_page')) {
            $locations[] = array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'hotel-landing',
                ),
            );
        }

        return $locations;
    }
}

if (!function_exists('hotel_landing_acf_text')) {
    function hotel_landing_acf_text($key, $label, $name, $default = '', $type = 'text', $instructions = '')
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => $type,
            'instructions' => $instructions,
            'default_value' => '',
            'placeholder' => is_string($default) ? $default : '',
        );
    }
}

if (!function_exists('hotel_landing_acf_number')) {
    function hotel_landing_acf_number($key, $label, $name, $default = 5)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'number',
            'default_value' => '',
            'placeholder' => $default,
            'min' => 1,
            'max' => 5,
            'step' => 1,
        );
    }
}

if (!function_exists('hotel_landing_acf_image')) {
    function hotel_landing_acf_image($key, $label, $name, $instructions = '')
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'image',
            'instructions' => $instructions,
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        );
    }
}

if (!function_exists('hotel_landing_acf_link')) {
    function hotel_landing_acf_link($key, $label, $name)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'link',
            'return_format' => 'array',
        );
    }
}

if (!function_exists('hotel_landing_register_group')) {
    function hotel_landing_register_group($key, $title, $fields)
    {
        acf_add_local_field_group(array(
            'key' => $key,
            'title' => $title,
            'fields' => $fields,
            'location' => hotel_landing_acf_locations(),
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
        ));
    }
}

if (!function_exists('hotel_landing_acf_simple_links')) {
    function hotel_landing_acf_simple_links($key, $label, $name)
    {
        return array(
            'key' => $key,
            'label' => $label,
            'name' => $name,
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm liên kết',
            'sub_fields' => array(
                hotel_landing_acf_text($key . '_label', 'Nhãn', 'label'),
                hotel_landing_acf_text($key . '_url', 'URL / Anchor', 'url', '#'),
            ),
        );
    }
}

add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Landing máy lọc không khí',
            'menu_title' => 'Landing máy lọc không khí',
            'menu_slug' => 'hotel-landing',
            'capability' => 'edit_posts',
            'redirect' => false,
            'position' => 30,
            'icon_url' => 'dashicons-filter',
        ));
    }

    hotel_landing_register_group('group_air_landing_header', 'Landing - Header', array(
        hotel_landing_acf_image('field_air_logo', 'Logo', 'air_logo', 'Upload logo dạng PNG/SVG/WebP.'),
        hotel_landing_acf_text('field_air_brand_name', 'Tên thương hiệu fallback', 'air_brand_name', hotel_landing_default('air_brand_name')),
        hotel_landing_acf_text('field_air_brand_subtitle', 'Dòng phụ thương hiệu fallback', 'air_brand_subtitle', hotel_landing_default('air_brand_subtitle')),
        array(
            'key' => 'field_air_nav_items',
            'label' => 'Menu landing',
            'name' => 'air_nav_items',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm menu',
            'sub_fields' => array(
                hotel_landing_acf_text('field_air_nav_label', 'Nhãn', 'label'),
                hotel_landing_acf_text('field_air_nav_url', 'Link/Anchor', 'url', '#'),
            ),
        ),
        hotel_landing_acf_link('field_air_header_button', 'Nút liên hệ trên header', 'air_header_button'),
    ));

    hotel_landing_register_group('group_air_landing_hero', 'Landing - Hero & Form tư vấn', array(
        hotel_landing_acf_image('field_air_hero_background', 'Ảnh nền căn hộ', 'air_hero_background', 'Khuyến nghị 1920x900, nhẹ và sáng.'),
        hotel_landing_acf_image('field_air_hero_product_image', 'Ảnh sản phẩm hero', 'air_hero_product_image', 'Ảnh máy lọc nền trong hoặc nền sáng.'),
        hotel_landing_acf_text('field_air_hero_title', 'Tiêu đề chính', 'air_hero_title', hotel_landing_default('air_hero_title'), 'textarea'),
        hotel_landing_acf_text('field_air_hero_subtitle', 'Mô tả ngắn dưới tiêu đề', 'air_hero_subtitle', hotel_landing_default('air_hero_subtitle'), 'textarea'),
        hotel_landing_acf_text('field_air_hero_description', 'Mô tả SEO/ẩn dự phòng', 'air_hero_description', hotel_landing_default('air_hero_description'), 'textarea'),
        hotel_landing_acf_link('field_air_hero_button', 'Nút hero', 'air_hero_button'),
        array(
            'key' => 'field_air_hero_badges',
            'label' => 'Thông số nổi bật quanh sản phẩm',
            'name' => 'air_hero_badges',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm thông số',
            'sub_fields' => array(
                hotel_landing_acf_text('field_air_hero_badge_label', 'Nhãn ngắn', 'label'),
                hotel_landing_acf_text('field_air_hero_badge_value', 'Mô tả', 'value'),
            ),
        ),
        hotel_landing_acf_text('field_air_form_title', 'Tiêu đề form', 'air_form_title', hotel_landing_default('air_form_title')),
        hotel_landing_acf_text('field_air_form_description', 'Mô tả form', 'air_form_description', hotel_landing_default('air_form_description')),
        hotel_landing_acf_text('field_air_form_shortcode', 'Shortcode form thật', 'air_form_shortcode', '', 'text', 'Dán shortcode Contact Form 7/Caldera nếu muốn nhận lead. Để trống sẽ hiện form giao diện mẫu.'),
        hotel_landing_acf_text('field_air_form_action', 'Action của form mẫu', 'air_form_action', '#'),
        hotel_landing_acf_text('field_air_form_name_placeholder', 'Placeholder họ tên', 'air_form_name_placeholder', hotel_landing_default('air_form_name_placeholder')),
        hotel_landing_acf_text('field_air_form_phone_placeholder', 'Placeholder số điện thoại', 'air_form_phone_placeholder', hotel_landing_default('air_form_phone_placeholder')),
        hotel_landing_acf_text('field_air_form_location_placeholder', 'Placeholder tỉnh/thành', 'air_form_location_placeholder', hotel_landing_default('air_form_location_placeholder')),
        hotel_landing_acf_text('field_air_form_submit_text', 'Text nút gửi', 'air_form_submit_text', hotel_landing_default('air_form_submit_text')),
        hotel_landing_acf_text('field_air_form_privacy_text', 'Dòng bảo mật', 'air_form_privacy_text', hotel_landing_default('air_form_privacy_text')),
    ));

    hotel_landing_register_group('group_air_landing_products', 'Landing - Sản phẩm nổi bật', array(
        hotel_landing_acf_text('field_air_products_title', 'Tiêu đề', 'air_products_title', hotel_landing_default('air_products_title')),
        hotel_landing_acf_text('field_air_products_description', 'Mô tả', 'air_products_description', hotel_landing_default('air_products_description'), 'textarea'),
        array(
            'key' => 'field_air_products',
            'label' => 'Danh sách sản phẩm',
            'name' => 'air_products',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm sản phẩm',
            'sub_fields' => array(
                hotel_landing_acf_image('field_air_product_image', 'Ảnh sản phẩm', 'image'),
                hotel_landing_acf_text('field_air_product_title', 'Tên sản phẩm', 'title'),
                hotel_landing_acf_text('field_air_product_description', 'Mô tả ngắn', 'description', '', 'textarea'),
                hotel_landing_acf_text('field_air_product_price', 'Giá', 'price', 'Liên hệ'),
                hotel_landing_acf_number('field_air_product_rating', 'Số sao', 'rating', 5),
                array(
                    'key' => 'field_air_product_facts',
                    'label' => 'Thông số ngắn',
                    'name' => 'facts',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Thêm thông số',
                    'sub_fields' => array(
                        hotel_landing_acf_text('field_air_product_fact_icon_class', 'FontAwesome class', 'icon_class', 'fa-regular fa-circle-check'),
                        hotel_landing_acf_text('field_air_product_fact_label', 'Nội dung', 'label'),
                    ),
                ),
                hotel_landing_acf_link('field_air_product_link', 'Link chi tiết', 'link'),
            ),
        ),
    ));

    hotel_landing_register_group('group_air_landing_intro', 'Landing - Giải pháp / Về Auira', array(
        hotel_landing_acf_image('field_air_intro_image', 'Ảnh chính', 'air_intro_image', 'Ảnh không gian căn hộ hoặc thi công.'),
        hotel_landing_acf_image('field_air_intro_secondary_image', 'Ảnh phụ', 'air_intro_secondary_image', 'Ảnh sản phẩm lắp đặt hoặc chi tiết thiết bị.'),
        hotel_landing_acf_text('field_air_intro_eyebrow', 'Tiêu đề phụ', 'air_intro_eyebrow', hotel_landing_default('air_intro_eyebrow')),
        hotel_landing_acf_text('field_air_intro_title', 'Tiêu đề', 'air_intro_title', hotel_landing_default('air_intro_title')),
        hotel_landing_acf_text('field_air_intro_description', 'Mô tả', 'air_intro_description', hotel_landing_default('air_intro_description'), 'textarea'),
        hotel_landing_acf_link('field_air_intro_button', 'Nút liên kết', 'air_intro_button'),
    ));

    hotel_landing_register_group('group_air_landing_certifications', 'Landing - Giải thưởng & chứng nhận', array(
        hotel_landing_acf_text('field_air_certifications_title', 'Tiêu đề', 'air_certifications_title', hotel_landing_default('air_certifications_title')),
        hotel_landing_acf_text('field_air_certifications_description', 'Mô tả', 'air_certifications_description', hotel_landing_default('air_certifications_description'), 'textarea'),
        array(
            'key' => 'field_air_certifications',
            'label' => 'Danh sách chứng nhận',
            'name' => 'air_certifications',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm chứng nhận',
            'sub_fields' => array(
                hotel_landing_acf_image('field_air_certification_logo', 'Logo / icon', 'logo'),
                hotel_landing_acf_text('field_air_certification_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-award'),
                hotel_landing_acf_text('field_air_certification_title', 'Tên chứng nhận', 'title'),
                hotel_landing_acf_text('field_air_certification_description', 'Mô tả / năm', 'description'),
            ),
        ),
    ));

    hotel_landing_register_group('group_air_landing_features', 'Landing - Ưu điểm', array(
        hotel_landing_acf_text('field_air_features_title', 'Tiêu đề', 'air_features_title', hotel_landing_default('air_features_title')),
        hotel_landing_acf_text('field_air_features_description', 'Mô tả', 'air_features_description', hotel_landing_default('air_features_description'), 'textarea'),
        array(
            'key' => 'field_air_features',
            'label' => 'Danh sách ưu điểm',
            'name' => 'air_features',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm ưu điểm',
            'sub_fields' => array(
                hotel_landing_acf_image('field_air_feature_icon', 'Icon ảnh', 'icon'),
                hotel_landing_acf_text('field_air_feature_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-circle-check'),
                hotel_landing_acf_text('field_air_feature_title', 'Tiêu đề', 'title'),
                hotel_landing_acf_text('field_air_feature_description', 'Mô tả', 'description', '', 'textarea'),
            ),
        ),
    ));

    hotel_landing_register_group('group_air_landing_testimonials', 'Landing - Khách hàng nói gì', array(
        hotel_landing_acf_text('field_air_testimonials_title', 'Tiêu đề', 'air_testimonials_title', hotel_landing_default('air_testimonials_title')),
        hotel_landing_acf_text('field_air_testimonials_description', 'Mô tả', 'air_testimonials_description', hotel_landing_default('air_testimonials_description'), 'textarea'),
        array(
            'key' => 'field_air_testimonials',
            'label' => 'Danh sách đánh giá',
            'name' => 'air_testimonials',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm đánh giá',
            'sub_fields' => array(
                hotel_landing_acf_image('field_air_testimonial_avatar', 'Ảnh khách hàng', 'avatar'),
                hotel_landing_acf_number('field_air_testimonial_rating', 'Số sao', 'rating', 5),
                hotel_landing_acf_text('field_air_testimonial_comment', 'Nội dung đánh giá', 'comment', '', 'textarea'),
                hotel_landing_acf_text('field_air_testimonial_name', 'Tên khách hàng', 'name'),
                hotel_landing_acf_text('field_air_testimonial_location', 'Dự án / khu vực', 'location'),
            ),
        ),
    ));

    hotel_landing_register_group('group_air_landing_faq_cta', 'Landing - FAQ & CTA', array(
        hotel_landing_acf_image('field_air_faq_image', 'Ảnh minh họa FAQ', 'air_faq_image'),
        hotel_landing_acf_text('field_air_faq_title', 'Tiêu đề FAQ', 'air_faq_title', hotel_landing_default('air_faq_title')),
        hotel_landing_acf_text('field_air_faq_description', 'Mô tả FAQ', 'air_faq_description', hotel_landing_default('air_faq_description'), 'textarea'),
        array(
            'key' => 'field_air_faq_items',
            'label' => 'Danh sách câu hỏi',
            'name' => 'air_faq_items',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm câu hỏi',
            'sub_fields' => array(
                hotel_landing_acf_text('field_air_faq_question', 'Câu hỏi', 'question'),
                hotel_landing_acf_text('field_air_faq_answer', 'Câu trả lời', 'answer', '', 'textarea'),
            ),
        ),
        hotel_landing_acf_image('field_air_cta_background', 'Ảnh nền CTA', 'air_cta_background'),
        hotel_landing_acf_text('field_air_cta_title', 'Tiêu đề CTA', 'air_cta_title', hotel_landing_default('air_cta_title')),
        hotel_landing_acf_text('field_air_cta_description', 'Mô tả CTA', 'air_cta_description', hotel_landing_default('air_cta_description'), 'textarea'),
        hotel_landing_acf_link('field_air_cta_button', 'Nút CTA', 'air_cta_button'),
    ));

    hotel_landing_register_group('group_air_landing_footer', 'Landing - Footer', array(
        hotel_landing_acf_image('field_air_footer_logo', 'Logo footer', 'air_footer_logo'),
        hotel_landing_acf_text('field_air_footer_description', 'Mô tả footer', 'air_footer_description', hotel_landing_default('air_footer_description'), 'textarea'),
        hotel_landing_acf_simple_links('field_air_footer_product_links', 'Cột sản phẩm', 'air_footer_product_links'),
        hotel_landing_acf_simple_links('field_air_footer_solution_links', 'Cột giải pháp', 'air_footer_solution_links'),
        hotel_landing_acf_simple_links('field_air_footer_about_links', 'Cột về thương hiệu', 'air_footer_about_links'),
        array(
            'key' => 'field_air_footer_contacts',
            'label' => 'Thông tin liên hệ',
            'name' => 'air_footer_contacts',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Thêm liên hệ',
            'sub_fields' => array(
                hotel_landing_acf_text('field_air_footer_contact_icon_class', 'FontAwesome class', 'icon_class', 'fa-solid fa-circle-info'),
                hotel_landing_acf_text('field_air_footer_contact_text', 'Nội dung', 'text'),
                hotel_landing_acf_text('field_air_footer_contact_url', 'Link', 'url'),
            ),
        ),
        array(
            'key' => 'field_air_footer_socials',
            'label' => 'Mạng xã hội',
            'name' => 'air_footer_socials',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Thêm mạng xã hội',
            'sub_fields' => array(
                hotel_landing_acf_text('field_air_footer_social_label', 'Tên mạng xã hội', 'label'),
                hotel_landing_acf_image('field_air_footer_social_icon', 'Icon ảnh', 'icon'),
                hotel_landing_acf_text('field_air_footer_social_icon_class', 'FontAwesome class', 'icon_class', 'fa-brands fa-facebook-f'),
                hotel_landing_acf_text('field_air_footer_social_url', 'Link', 'url', '#'),
            ),
        ),
        hotel_landing_acf_text('field_air_copyright', 'Copyright', 'air_copyright', hotel_landing_default('air_copyright')),
    ));
});

if (!function_exists('hotel_landing_render_parts')) {
    function hotel_landing_render_parts()
    {
        get_template_part('template-parts/landing-header');
        get_template_part('template-parts/hero');
        get_template_part('template-parts/featured-rooms');
        get_template_part('template-parts/hotel-intro');
        get_template_part('template-parts/dining-section');
        get_template_part('template-parts/hotel-amenities');
        get_template_part('template-parts/reviews-section');
        get_template_part('template-parts/offers-section');
        get_template_part('template-parts/landing-footer');
    }
}

add_shortcode('landing_page', function () {
    ob_start();
    ?>
    <main id="main-landing" class="landing-page hotel-landing air-landing">
        <?php hotel_landing_render_parts(); ?>
    </main>
    <?php
    return ob_get_clean();
});
