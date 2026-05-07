# Landing Page Khách Sạn - Hướng Dẫn Nhanh

Landing khách sạn được dựng bằng WordPress + ACF trong theme `HOTEL`. Nội dung có thể nhập ở page dùng template `Landing Page`, hoặc trong menu ACF Options Page `Landing khách sạn` nếu ACF Pro đang bật.

## File Chính

- `wp-content/themes/HOTEL/custom/acf-landing.php`: khai báo field groups, fallback content và shortcode `[landing_page]`.
- `wp-content/themes/HOTEL/page-landing.php`: page template render toàn bộ landing.
- `wp-content/themes/HOTEL/assets/css/landing.css`: style riêng cho landing khách sạn.
- `wp-content/themes/HOTEL/assets/js/landing.js`: smooth scroll và xử lý form newsletter fallback.
- `wp-content/themes/HOTEL/template-parts/*.php`: từng section của landing.

## Template Parts

Thứ tự render giống mockup:

1. `landing-header.php`: logo, menu, nút booking.
2. `hero.php`: hero nền ảnh, headline, mô tả, CTA.
3. `quick-features.php`: dải tiện ích nổi dưới hero.
4. `hotel-intro.php`: giới thiệu và 4 lợi thế.
5. `featured-rooms.php`: các hạng phòng nổi bật.
6. `hotel-amenities.php`: tiện ích khách sạn.
7. `dining-section.php`: nhà hàng và ẩm thực.
8. `offers-section.php`: ưu đãi.
9. `testimonials.php`: đánh giá khách hàng.
10. `landing-footer.php`: footer landing, liên hệ, link nhanh, newsletter.

## Cách Tạo Trang Landing

1. Vào `Pages` -> `Add New`.
2. Đặt tên trang, ví dụ `XHOME Đà Nẵng`.
3. Trong phần `Template`, chọn `Landing Page`.
4. Publish.
5. Nhập nội dung ACF trực tiếp trên page, hoặc vào `Landing khách sạn` trong admin để nhập nội dung dùng chung.

Có thể dùng shortcode `[landing_page]` trong một page bất kỳ. Khi dùng shortcode, CSS/JS landing vẫn được enqueue tự động.

## Nhóm ACF

- `Landing - Header`: logo, brand fallback, menu, nút booking.
- `Landing - Hero`: ảnh nền, tiêu đề, mô tả, CTA, dải tiện ích nhanh.
- `Landing - Giới thiệu`: title, mô tả, các lợi thế.
- `Landing - Hạng phòng`: danh sách phòng, ảnh, mô tả, link.
- `Landing - Tiện ích`: danh sách tiện ích kèm icon.
- `Landing - Nhà hàng & Ẩm thực`: các card nhà hàng/bar/buffet.
- `Landing - Ưu đãi`: các gói khuyến mãi.
- `Landing - Đánh giá`: review khách hàng.
- `Landing - Footer`: liên hệ, mạng xã hội, link nhanh, newsletter.

## Gợi Ý Kích Thước Ảnh

- Hero: tối thiểu `1920x760`.
- Phòng: tối thiểu `900x520`.
- Nhà hàng: tối thiểu `700x360`.
- Ưu đãi: tối thiểu `500x300`.
- Avatar đánh giá: `160x160`.
- Logo/icon: dùng PNG, SVG hoặc WebP.

## Ghi Chú

- Nếu chưa nhập ACF, landing vẫn hiển thị nội dung mẫu giống bố cục ảnh.
- Icon có thể dùng ảnh upload hoặc FontAwesome class, ví dụ `fa-solid fa-wifi`.
- URL local hiện tại: `http://localhost/hotel`.
