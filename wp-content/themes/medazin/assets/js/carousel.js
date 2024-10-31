jQuery(document).ready(function($) {
	
// -------------------------- Testimonial Section  ----------------->

    function testimonial() {
        $('.testimonial-items').owlCarousel({
            loop: true,
            margin: 10,
			rtl: $("html").attr("dir") == 'rtl' ? true : false,
            nav: true,
            center: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                991: {
                    items: 2
                },
                1199: {
                    items: 3
                }
            }
        })
    }
    // -------------- End


    // ---------- Calling All Functions ---------------------->
    
        testimonial();
});