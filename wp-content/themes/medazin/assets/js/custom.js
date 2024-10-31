(function($) {
    'use strict';

    // ---------------- PreLoader ------------------->
    function preloader() {
        // Loader 
        $(".prealoader").delay(3000).slideUp(500);
        $(".prealoader .close-loader").delay(3000).show(200);
        // Loader Close button
        $('.prealoader .close-loader a').click(function() {
            $('.prealoader').hide();
        });
    }
    // ---------------- End -----------------------//

    // ------------ Magnific Popup ----------------------//
    function youtubeVideo() {
        if ($("a").hasClass("youtube")) {
            $('.youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            })
        }
    }
    // ---------- End ---------------------


    // ----------------  Header Search Popup ------------------->
    function header_search() {
        $(document).on('click', '.header-search-toggle', function(e) {
            $("body").addClass('header-search-active');
            $("body").addClass("overlay-enabled");
        });

        $(document).on('click', '.header-search-close', function(e) {
            $("body").removeClass('header-search-active');
            $("body").removeClass("overlay-enabled");
            return this;
        });

        // Search Popup Close
        // $(document).on('keyup', function(e) {
            // if (e.keyCode == 27) {
                // $mob_menu.removeClass("header-menu-active");
                // $mob_menu.removeClass("overlay-enabled");
                // $(".header-search-popup").removeClass('header-search-active');
            // }
        // });


        // ============================= Search TRAP ========================>
        var searchTrap = function(elem) {
            let tabbable = elem.find('select, input, textarea, button, a,button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])').filter(':visible');
            let firstTabbable = tabbable.first();
            let lastTabbable = tabbable.last();
            //set focus on first input/
            $(".mobile-menu-close").focus();
            //redirect last tab to first input/
            lastTabbable.on('keydown', function(e) {
                if ((e.which === 9 && !e.shiftKey)) {
                    e.preventDefault();
                    firstTabbable.focus();
                }
            });
            //redirect first shift+tab to last input/
            firstTabbable.on('keydown', function(e) {
                if ((e.which === 9 && e.shiftKey)) {
                    e.preventDefault();
                    lastTabbable.focus();
                }
            });
        };
        $(document).on('click', '.header-search-toggle', function(e) {
            $("body").addClass('header-search-active');
            $("body").addClass("overlay-enabled");
            searchTrap($('.header-search-popup'));
        });

    }
    // ------------- End ----------------------------

    // ------------------ Docker ---------------------

    // About
    function authorToggleHandler(o) {
        var t = $(".toggle-icon"),
            e = $(".author-close");
        $("body").toggleClass("author-popup-active"), $("body").toggleClass("overlay-enabled"), $("body").hasClass("author-popup-active") ? e.focus() : t.focus(), authorPopupAccessibility()
    }

    function hideAuthorPopup(o) {
        var t = $(".toggle-icon"),
            e = $(".author-popup");
        $(o.target).closest(t).length || $(o.target).closest(e).length || $("body").hasClass("author-popup-active") && ($("body").removeClass("author-popup-active"), $("body").removeClass("overlay-enabled"), t.focus(), o.stopPropagation())
    }

    function authorPopupAccessibility() {
        var links, i, len, searchItem = document.querySelector('.author-popup'),
            fieldToggle = document.querySelector('.author-close');
        let focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
        let firstFocusableElement = fieldToggle;
        let focusableContent = searchItem.querySelectorAll(focusableElements);
        let lastFocusableElement = focusableContent[focusableContent.length - 1];
        if (!searchItem) {
            return !1
        }
        links = searchItem.getElementsByTagName('button');
        for (i = 0, len = links.length; i < len; i++) {
            links[i].addEventListener('focus', toggleFocus, !0);
            links[i].addEventListener('blur', toggleFocus, !0)
        }

        function toggleFocus() {
            var self = this;
            while (-1 === self.className.indexOf('author-anim')) {
                if ('input' === self.tagName.toLowerCase()) {
                    if (-1 !== self.className.indexOf('focus')) {
                        self.className = self.className.replace('focus', '')
                    } else {
                        self.className += ' focus'
                    }
                }
                self = self.parentElement
            }
        }
        document.addEventListener('keydown', function(e) {
            let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
            if (!isTabPressed) {
                return
            }
            if (e.shiftKey) {
                if (document.activeElement === firstFocusableElement) {
                    lastFocusableElement.focus();
                    e.preventDefault()
                }
            } else {
                if (document.activeElement === lastFocusableElement) {
                    firstFocusableElement.focus();
                    e.preventDefault()
                }
            }
        })
    }
    $(document).on("click", ".toggle-icon", authorToggleHandler), $(document).on("click", ".author-close", authorToggleHandler), $(document).on("click", hideAuthorPopup), $(document).on("click", ".author-close", function() {
        $("body").removeClass("overlay-enabled");
    });



    // ------------------ End  



    // ====================== Main Slider ==========================>


    function owlMainThumb() {
        var owlMainSlider = $('.header-slider');
        $('.owl-item').removeClass('prev next');
        var currentSlide = $('.home-slider .owl-item.active');
        currentSlide.next('.owl-item').addClass('next');
        currentSlide.prev('.owl-item').addClass('prev');
        var nextSlideImg = $('.owl-item.next').find('.item img').attr('src');
        var prevSlideImg = $('.owl-item.prev').find('.item img').attr('src');
        // // console.log(nextSlideImg);
        $('.home-slider .owl-nav .owl-prev').css({
            backgroundImage: 'url(' + prevSlideImg + ')'
        });
        $('.home-slider .owl-nav .owl-next').css({
            backgroundImage: 'url(' + nextSlideImg + ')'
        });
        owlMainSlider.on('translated.owl.carousel', function() {
            owlMainThumb();
        });
    }


    // ---------------------- Info Section ------------>
    function info_toggle() {
        $('#toggle-btn ').click(function() {
            $('#toggle-btn i ').toggleClass('active ');
            $('.info-carousel ').slideToggle(1000);
        })
    }
    // ----------------- End --------------------





    // ------------- Pricing Switcher Toggle ------------->
    function Switcher_toggle() {
        $('#yearly').click(function() {
            $('.pricing-filter-badge').css({
                'display': 'block',
                'top': '-45px'
            }).slideDown(1000);
        })
        $('#monthly').click(function() {
            $('.pricing-filter-badge').hide(500);
        })
    }
    // ---------- End ------------------------------

    // ----------------------- Funfact Counter Section ---------------------->
    function counter_up() {
        if ($(document).has(".counter")) {
            $('.counter').counterUp({
                delay: 20,
                time: 1000
            });
        }
    }
    // ---------------- End ------------------------

    // ---------------- Ripple Bg Effect---------------------->

    function rippleEffect() {
        if ($(document).has(".ripple-area")) {
            $(".ripple-area").ripples({
                resolution: 512,
                dropRadius: 20,
                // interactive: true,
                perturbance: 0.04,
            });
        }
    }
    // ------------------- End  ------------------------
    // ======================= Back to Top Buttton Script ===================== //
    function backtotop() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.mouse').fadeIn();
            } else {
                $('.mouse').fadeOut();
            }
        });
        $('.mouse').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    }
    //  ================== END =====================>

    // ======================== Pricing Filter Tab ===============>
    function pricing_filter() {
        $(".tab-filter a ").click(function() {
            var value = $(this).attr('data-filter');

            if (value == "monthly ") {

                $('.monthly ').show('1000');
                $('.yearly ').hide('1000');
            } else {

                $(".filter ").not('.' + value).hide('3000');
                $('.filter').filter('.' + value).show('3000');

            }
        });

        if ($(".tab-filter a ").removeClass("")) {
            $(this).removeClass("active ");
        }
        $(this).addClass("active ");

    }
    // ======================== End ===============//

    // ================= Mobile Menu DropDown Toggle ====================>
    function mobile_menu() {
        if ($(document).has(".main-menu")) {
            $(".main-menu .mobile-collapsed").on("click", function(e) {
                e.preventDefault();
                $(this).next().slideToggle();

            });
            $(".mobile-collapsed").on("click", function(e) {
                e.preventDefault();
                $(this).parent().toggleClass("current");
            });
        }
    }
    // ======================== En====================//


    // ================================== Mobile menu  Trap ================================>
    function Mobile_menu() {
        //Mobile TRAP
        var mobileTrap = function(elem) {
            elem.fadeIn();
            let tabbable = elem.find('select, input, textarea, button, a,button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])').filter(':visible');
            let firstTabbable = tabbable.first();
            let lastTabbable = tabbable.last();
            firstTabbable.focus();
            //redirect last tab to first input/
            lastTabbable.on('keydown', function(e) {
                if ((e.which === 9 && !e.shiftKey)) {
                    e.preventDefault();
                    firstTabbable.focus();
                }
            });
            //redirect first shift+tab to last input/
            firstTabbable.on('keydown', function(e) {
                if ((e.which === 9 && e.shiftKey)) {
                    e.preventDefault();
                    lastTabbable.focus();
                }
            });
        };

        //mobile Menu
        $(".menu-collapsed").on("click", function() {
            $("body").addClass("header-menu-active");
            $("body").addClass("overlay-enabled");
            mobileTrap($('.main-mobile-wrapper'));
        });

        $(".menu-collapsed").on("click", function() {
            $("body").addClass("header-menu-active");
            $("body").addClass("overlay-enabled");
        });
        $(".close-style").on("click", function() {
            $("body").removeClass("header-menu-active");
            $("body").removeClass("overlay-enabled");
        });
    }
    // ===================================== End ================================>

    // ==================== Above Header Focus Trap ==================>
    function contactInfo() {
        var contactInfo = function(elem) {
            elem.fadeIn();
            let tabbable = elem.find('select, input, textarea, button, a,button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])').filter(':visible');
            let firstTabbable = tabbable.first();
            let lastTabbable = tabbable.last();
            //set focus on first input/
            $(".header-above-collapse ").focus();
            //redirect last tab to first input/
            lastTabbable.on('keydown', function(e) {
                if ((e.which === 9 && !e.shiftKey)) {
                    e.preventDefault();
                    firstTabbable.focus();
                }
            });
            //redirect first shift+tab to last input/
            firstTabbable.on('keydown', function(e) {
                if ((e.which === 9 && e.shiftKey)) {
                    e.preventDefault();
                    lastTabbable.focus();
                }
            });
            $(document).on("keydown", function(e) {
                if (e.which === 27) {
                    $('.header .top-above-header').fadeOut();
                    $(".header-above-collapse ").focus();
                }
            })

            $(".header-above-collapse").click(function() {
                $('.header .top-above-header').fadeOut();
                $(".header-above-collapse ").focus();
                // $(".menu-toggle").focus();
            });
        };
        $(document).on('click', '.header-above-collapse', function(e) {
            contactInfo($('.header .top-above-header'));
        });
    }


    // ==================== End =======================//

    // ================== Product Single Tab Filter =============>
    function prodcut_single() {
        $(".wc-tabs li").click(function() {
            $(".wc-tabs li").removeClass("active");
            $(this).addClass("active");

        });

        $(".wc-tabs li").click(function(e) {
            e.preventDefault();
            $(this).parent().siblings().hide();
            var get_id = $(this).attr("id");
            $(this).parent().siblings().filter(`[aria-labelledby*=${get_id}]`).show();
        });
    }
    // ================ End =======================

    // ===================== Sticky Header =========================
    function sticky_header() {
        if ($(document).has(".is-sticky-on")) {
            if ($(".is-sticky-on").length > 0) {
                $(window).on('scroll', function() {
                    if ($(window).scrollTop() >= 250) {
                        $('.is-sticky-on').addClass('is-sticky-menu');
                    } else {
                        $('.is-sticky-on').removeClass('is-sticky-menu');
                    }
                });
            }
        }
    }
    // ==================== End ==================================>
    // ================ End =====================//

    // ==================== Pricing Toogle Active class =================>

    function pricingToggle() {
        $(document).on('click', '.pricing-switcher .tab-filter a', function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
    }
    // ========================= End =======================//

    // =================== Load More Button ===================>
    function load_More() {
        $(".load-3").slice(0, 4).show();
        $(".load-btn").on('click', function(e) {
            e.preventDefault();
            $(".load-btn").addClass("loadspinner");
            $(".load-btn").animate({
                    display: "block"
                }, 2000,
                function() {
                    $(".load-3:hidden").slice(0, 4).slideDown();
                    if ($(".load-item:hidden").length === 0) {
                        $(".load-btn").text("No more");
                    }
                    $(".load-btn").removeClass("loadspinner");
                }
            );
        });
    }
    // ================== End ===================//

    // =============== Show Password (Registration) ==================>
    function showPassword() {
        $('.register .show-password-input').on('click', function() {
            var passInput = $(".register #reg_password");
            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
            } else {
                passInput.attr('type', 'password');
            }
        });
        $(' .login .show-password-input').on('click', function() {
            var passInput = $(".login #password");
            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
            } else {
                passInput.attr('type', 'password');
            }
        })
    }
    // -==================== End =============

    // ================= Active Menu ===============>

    function activeMenu() {
        var url = window.location.pathname,
            urlRegExp = new RegExp(url.replace(/\/$/, '') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        $('.main-menu li a').each(function() {
            // alert(url);
            // and test its normalized href against the url pathname regexp
            if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                $(this).addClass('active');
            }
        });
    }
    // ======================== End ============================>

    // ========== WOW animation =================>
    function wow() {
        new WOW().init();
    }
    // ============== End ==============//
    // ========== Footer Content animation =================>
    function footerContent() {
        let plus_icon = $("<span class='collaps'></span>").html("<i class='fa fa-plus-circle'></i>");
        let minus_icon = $("<span class='collapsd'></span>").html("<i class='fa fa-minus-circle'></i>");
        $(".footer-content-wrap").append(plus_icon, minus_icon);
        $(".footer-content-wrap > span").click(function() {
            if (!$(this).parents('.footer-content-wrap').hasClass('active')) {
                $(this).parents('.footer-content-wrap').addClass('active');
                // $(this).parent().children('div,ul,form,img').slideDown();
                $(this).parent().find('.widget-title').next().slideDown();
                $(this).parent().children(".widget-contact").slideDown();
            } else {
                $(this).parents('.footer-content-wrap').removeClass('active');
                // $(this).parent().children('div,ul,form,img').slideUp();
                $(this).parent().find('.widget-title').next().slideUp();
                $(this).parent().children(".widget-contact").slideUp();
            }
        });

        $(window).resize(function() {
            if ($(this).width() > 767) {
                $(".footer-content-wrap > span").parent().find('.widget-title').next().slideDown();
                $(".footer-content-wrap > span").parent().children(".widget-contact").slideDown();
                $(".footer-content-wrap > span").css("visibility", "hidden");
            } else {
                $(".footer-content-wrap > span").parent().find('.widget-title').next(':not(:has(a.custom-logo-link))').slideUp();
                $(".footer-content-wrap > span").parent().children(".widget-contact").slideUp();
                $(".footer-content-wrap > span").css("visibility", "visible");
                $('.footer-content-wrap').removeClass('active');
            }
        });
    }
    // ============== End ==============//

    // ------------------ Calling for All Functions -------------------------//

    $(document).ready(function() {
        preloader();
        footerContent();
        youtubeVideo();
        header_search();
        owlMainThumb();
        info_toggle();
        Switcher_toggle();
        // counter_up();
        pricing_filter();
        backtotop();
        mobile_menu();
        Mobile_menu();
        contactInfo()
        pricingToggle();
        rippleEffect();
        sticky_header();
        activeMenu();
        prodcut_single();
        wow();
        load_More();
        showPassword();
    });

})(window.jQuery);