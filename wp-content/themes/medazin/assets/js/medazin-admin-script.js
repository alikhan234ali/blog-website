(function ($) {
    $(document).ready(function () {
        $('.medazin-btn-get-started').on('click', function (e) {
            e.preventDefault();
            $(this).html('Processing.. Please wait').addClass('updating-message');

            // Include the nonce in the AJAX request data
            var data = {
                action: 'install_act_plugin',
                nonce: medazin_ajax_object.nonce // Read the nonce passed from wp_localize_script
            };

            $.post(medazin_ajax_object.ajax_url, data, function (response) {
                location.href = 'customize.php?medazin_notice=dismiss-get-started';
            });
        });

        $(document).on('click', '.notice-get-started-class .notice-dismiss', function () {
            var type = $(this).closest('.notice-get-started-class').data('notice');

            // Include the nonce in the AJAX request data
            var data = {
                action: 'medazin_dismissed_notice_handler',
                type: type,
                nonce: medazin_ajax_object.nonce // Read the nonce passed from wp_localize_script
            };

            // Make an AJAX call with the nonce
            $.ajax({
                type: 'POST',
                url: medazin_ajax_object.ajax_url,
                data: data,
                beforeSend: function (xhr) {
                    // Verify the nonce before sending the request
                    xhr.setRequestHeader('X-WP-Nonce', medazin_ajax_object.nonce);
                }
            });
        });
    });
})(jQuery);
