<?php
$survey_shortcode = aquira_landing_get_field('water_survey_shortcode', aquira_landing_default('water_survey_shortcode'));
$survey_title = aquira_landing_get_field('water_survey_title', aquira_landing_default('water_survey_title'));
$contact_title = aquira_landing_get_field('water_contact_title', aquira_landing_default('water_contact_title'));
$contact_description = aquira_landing_get_field('water_contact_description', aquira_landing_default('water_contact_description'));
$privacy_title = aquira_landing_get_field('water_privacy_title', aquira_landing_default('water_privacy_title'));
$privacy_description = aquira_landing_get_field('water_privacy_description', aquira_landing_default('water_privacy_description'));
$submit_text = aquira_landing_get_field('water_submit_text', aquira_landing_default('water_submit_text'));
$can_render_fluent = aquira_landing_can_render_fluent_form($survey_shortcode);
?>

<section class="water-section water-survey" id="survey">
    <div class="water-container">
        <div class="water-survey__shell">
            <?php if ($can_render_fluent) : ?>
                <div class="water-survey__fluent">
                    <?php echo do_shortcode($survey_shortcode); ?>
                </div>
            <?php else : ?>
                <form class="water-survey-form" action="#" method="post">
                    <?php if ($survey_title) : ?>
                        <h2 class="screen-reader-text"><?php echo esc_html($survey_title); ?></h2>
                    <?php endif; ?>

                    <div class="water-survey-form__grid">
                        <fieldset class="water-question water-question--wide">
                            <legend>Q1: Sau một thời gian sinh sống, anh/chị có gặp tình trạng nào dưới đây trong căn hộ không?</legend>
                            <label><input type="checkbox" name="water_issue[]" value="scale"> <span>Thiết bị phòng tắm / vòi nước dễ bám cặn</span></label>
                            <label><input type="checkbox" name="water_issue[]" value="dry_skin"> <span>Da hoặc tóc khô hơn sau khi tắm</span></label>
                            <label><input type="checkbox" name="water_issue[]" value="pressure"> <span>Nước lúc mạnh lúc yếu trong sinh hoạt</span></label>
                            <label><input type="checkbox" name="water_issue[]" value="maintenance"> <span>Muốn chăm sóc hệ thống đường nước tốt hơn</span></label>
                        </fieldset>

                        <div class="water-question-stack">
                            <fieldset class="water-question">
                                <legend>Q2: Anh/chị đã từng tìm hiểu cách để trải nghiệm nước sinh hoạt dễ chịu hơn chưa?</legend>
                                <label><input type="radio" name="water_research" value="searched"> <span>Đã từng tìm hiểu</span></label>
                                <label><input type="radio" name="water_research" value="interested"> <span>Có quan tâm nhưng chưa tìm hiểu kỹ</span></label>
                            </fieldset>

                            <fieldset class="water-question water-question--chips">
                                <legend>Q3: Gia đình mình hiện phù hợp với trường hợp nào dưới đây?</legend>
                                <label><input type="checkbox" name="water_family[]" value="children"> <span>Có trẻ nhỏ</span></label>
                                <label><input type="checkbox" name="water_family[]" value="sensitive"> <span>Người da / tóc nhạy cảm</span></label>
                                <label><input type="checkbox" name="water_family[]" value="living_space"> <span>Quan tâm không gian sống</span></label>
                            </fieldset>
                        </div>

                        <fieldset class="water-question water-question--devices">
                            <legend>Q4: Gia đình mình hiện đang sử dụng thiết bị nào dưới đây?</legend>
                            <label><input type="checkbox" name="water_devices[]" value="ro_uf"> <span>Máy lọc nước RO/UF</span></label>
                            <label><input type="checkbox" name="water_devices[]" value="ion"> <span>Máy lọc ion kiềm</span></label>
                            <label><input type="checkbox" name="water_devices[]" value="air"> <span>Máy lọc không khí</span></label>
                            <label><input type="checkbox" name="water_devices[]" value="robot"> <span>Robot hút bụi</span></label>
                        </fieldset>

                        <fieldset class="water-question water-question--textarea">
                            <legend>Q5: Điều gì khiến Anh/Chị trăn trở nhất về nguồn nước?</legend>
                            <textarea name="water_concern" rows="5" placeholder="Chia sẻ thêm lo lắng của anh chị về sức khỏe và thiết bị gia đình..."></textarea>
                        </fieldset>
                    </div>

                    <div class="water-survey-form__divider" aria-hidden="true"></div>

                    <fieldset class="water-question water-question--ready">
                        <legend>Q6: Anh/chị có muốn đội ngũ khảo sát thực tế ngay hôm nay?</legend>
                        <div class="water-ready-grid">
                            <label class="water-ready-card">
                                <input type="radio" name="water_ready" value="ready">
                                <span class="water-ready-card__radio" aria-hidden="true"></span>
                                <strong>Sẵn lòng</strong>
                                <input type="text" name="water_ready_time" placeholder="Khung giờ (VD: 18h-20h)">
                            </label>
                            <label class="water-ready-card">
                                <input type="radio" name="water_ready" value="maybe">
                                <span class="water-ready-card__radio" aria-hidden="true"></span>
                                <strong>Có thể nếu phù hợp</strong>
                            </label>
                            <label class="water-ready-card">
                                <input type="radio" name="water_ready" value="consider">
                                <span class="water-ready-card__radio" aria-hidden="true"></span>
                                <strong>Cần cân nhắc thêm</strong>
                            </label>
                        </div>
                    </fieldset>

                    <div class="water-contact-panel">
                        <div class="water-contact-panel__intro">
                            <div class="water-contact-panel__heading">
                                <span><i class="fa-solid fa-shield-halved" aria-hidden="true"></i></span>
                                <?php if ($contact_title) : ?>
                                    <h2><?php echo esc_html($contact_title); ?></h2>
                                <?php endif; ?>
                            </div>

                            <?php if ($contact_description) : ?>
                                <p><?php echo esc_html($contact_description); ?></p>
                            <?php endif; ?>

                            <div class="water-privacy-box">
                                <strong><i class="fa-solid fa-lock" aria-hidden="true"></i><?php echo esc_html($privacy_title); ?></strong>
                                <p><?php echo esc_html($privacy_description); ?></p>
                            </div>
                        </div>

                        <div class="water-contact-fields">
                            <label>
                                <span>Họ và tên</span>
                                <input type="text" name="water_name" placeholder="Nguyễn Văn A">
                            </label>
                            <label>
                                <span>Số điện thoại</span>
                                <input type="tel" name="water_phone" placeholder="090x xxx xxx">
                            </label>
                            <label class="water-contact-fields__full">
                                <span>Chung cư / Tòa nhà / Số căn hộ</span>
                                <input type="text" name="water_apartment" placeholder="Ví dụ: Căn 12.05 - Tòa A1 - Vinhomes Central Park">
                            </label>
                            <button type="submit">
                                <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                                <?php echo esc_html($submit_text); ?>
                            </button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>
