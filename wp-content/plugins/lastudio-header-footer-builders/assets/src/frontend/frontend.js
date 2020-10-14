(function ($) {
    "use strict";

    var $document = $(document);
    
    function strpos( haystack, needle, offset ) {
        var i = (haystack + '').indexOf(needle, (offset || 0));
        return i === -1 ? false : i
    }

    // Initialize global variable
    var LAHFB = {
        core        : {}
    };
    window.LAHFB = LAHFB;

    LAHFB.core.init = function(){

        var $header_builder = $('#lastudio-header-builder');

        // Navigation Current Menu
        $('.menu li.current-menu-item, .menu li.current_page_item, #side-nav li.current_page_item, .menu li.current-menu-ancestor, .menu li ul li ul li.current-menu-item , .hamburger-nav li.current-menu-item, .hamburger-nav li.current_page_item, .hamburger-nav li.current-menu-ancestor, .hamburger-nav li ul li ul li.current-menu-item, .full-menu li.current-menu-item, .full-menu li.current_page_item, .full-menu li.current-menu-ancestor, .full-menu li ul li ul li.current-menu-item ').addClass('current');
        $('.menu li ul li:has(ul)').addClass('submenu');


        // Social modal
        var header_social = $('.header-social-modal-wrap').html();
        $('.header-social-modal-wrap').remove();
        $(".main-slide-toggle").append(header_social);

        // Search modal Type 2
        var header_search_type2 = $('.header-search-modal-wrap').html();
        $('.header-search-modal-wrap').remove();
        $(".main-slide-toggle").append(header_search_type2);

        // Search Full
        var $header_search_typefull = $('.header-search-full-wrap').first();
        if($header_search_typefull.length){
            $('.searchform-fly > p').replaceWith($header_search_typefull.find('.searchform-fly-text'));
            $('.searchform-fly > .search-form').replaceWith($header_search_typefull.find('.search-form'));
            $('.header-search-full-wrap').remove();
            LA.core.InstanceSearch();
        }

        // Social dropdown
        $('.lahfb-social .js-social_trigger_dropdown').on('click', function (e) {
            e.preventDefault();
            $(this).siblings('.header-social-dropdown-wrap').fadeToggle('fast');
        });
        $('.header-social-dropdown-wrap a').on('click', function (e) {
            $('.header-social-dropdown-wrap').css({
                display: 'none'
            });
        });

        // Social Toggles
        $('.lahfb-social .js-social_trigger_slide').on('click', function (e) {
            e.preventDefault();

            console.log('ok');

            if( $header_builder.find('.la-header-social').hasClass('opened') ) {
                $header_builder.find('.main-slide-toggle').slideUp('opened');
                $header_builder.find('.la-header-social').removeClass('opened');
            }
            else{
                $header_builder.find('.main-slide-toggle').slideDown(240);
                $header_builder.find('#header-search-modal').slideUp(240);
                $header_builder.find('#header-social-modal').slideDown(240);
                $header_builder.find('.la-header-social').addClass('opened');
                $header_builder.find('.la-header-search').removeClass('opened');
            }
        });

        $document.on('click', function (e) {
            if( $(e.target).hasClass('js-social_trigger_slide')){
                return;
            }
            if ($header_builder.find('.la-header-social').hasClass('opened')) {
                $header_builder.find('.main-slide-toggle').slideUp('opened');
                $header_builder.find('.la-header-social').removeClass('opened');
            }
        });

        // Search full

        $('.lahfb-cart > a').on('click', function (e) {
            if(!$(this).closest('.lahfb-cart').hasClass('force-display-on-mobile')){
                if($(window).width() > 767){
                    e.preventDefault();
                    $('body').toggleClass('open-cart-aside');
                }
            }
            else{
                e.preventDefault();
                $('body').toggleClass('open-cart-aside');
            }
        });

        $('.lahfb-search.lahfb-header-full > a').on('click', function (e) {
            e.preventDefault()
            $('body').addClass('open-search-form');
            setTimeout(function(){
                $('.searchform-fly .search-field').focus();
            }, 600);
        });

        // Search Toggles
        $('.lahfb-search .js-search_trigger_slide').on('click', function (e) {

            if ($header_builder.find('.la-header-search').hasClass('opened')) {
                $header_builder.find('.main-slide-toggle').slideUp('opened');
                $header_builder.find('.la-header-search').removeClass('opened');
            }
            else {
                $header_builder.find('.main-slide-toggle').slideDown(240);
                $header_builder.find('#header-social-modal').slideUp(240);
                $header_builder.find('#header-search-modal').slideDown(240);
                $header_builder.find('.la-header-search').addClass('opened');
                $header_builder.find('.la-header-social').removeClass('opened');
                $header_builder.find('#header-search-modal .search-field').focus();
            }
        });

        $document.on('click', function (e) {
            if( $(e.target).hasClass('js-search_trigger_slide') || $(e.target).closest('.js-search_trigger_slide').length ) {
                return;
            }
            if($('.lahfb-search .js-search_trigger_slide').length){
                if ($header_builder.find('.la-header-search').hasClass('opened')) {
                    $header_builder.find('.main-slide-toggle').slideUp('opened');
                    $header_builder.find('.la-header-search').removeClass('opened');
                }
            }
        });

        if ($.fn.magnificPopup) {

            // Popup map or any iframe
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,

                fixedContentPos: false
            });

            // Inline popups
            $('.lahfb-modal-element').each(function (index, el) {
                $(this).magnificPopup({
                    type: 'inline',
                    removalDelay: 500,
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass = this.st.el.attr('data-effect');
                        }
                    },
                    midClick: true
                });
            });

        }


        if ($.fn.niceSelect) {
            $('.la-polylang-switcher-dropdown select').niceSelect();
        }


        if ($.fn.superfish) {
            $('.lahfb-area:not(.lahfb-vertical) .lahfb-nav-wrap:not(.has-megamenu) ul#nav').superfish({
                delay: 300,
                hoverClass: 'la-menu-hover',
                animation: {
                    opacity: "show",
                    height: 'show'
                },
                animationOut: {
                    opacity: "hide",
                    height: 'hide'
                },
                easing: 'easeOutQuint',
                speed: 100,
                speedOut: 0,
                pathLevels: 2,
            });
        }

        $('.lahfb-nav-wrap #nav li a').addClass('hcolorf');

        // Hamburger Menu
        var $hamurgerMenuWrapClone = $('.toggle').find('#hamburger-menu-wrap').clone().remove();
        if ($hamurgerMenuWrapClone.length > 0) {
            $('body').find('.la-hamuburger-bg').remove();
            $hamurgerMenuWrapClone.appendTo('body');
        }

        if ($('#hamburger-menu-wrap').hasClass('toggle-right')) {
            $('body').addClass('la-body lahmb-right');
        } else if ($('#hamburger-menu-wrap').hasClass('toggle-left')) {
            $('body').addClass('la-body lahmb-left');
        }

        //Hamburger Nicescroll
        $('.hamburger-menu-main').niceScroll({
            scrollbarid: 'lahfb-hamburger-scroll',
            cursorwidth: "5px",
            autohidemode: true
        });

        $('.la-body').find('.lahfb-hamburger-menu.toggle').on('click', 'a.lahfb-icon-element', function (event) {
            event.preventDefault();
            if ($(this).closest('.lahfb-hamburger-menu.toggle').hasClass('is-open')) {
                $(this).closest('.lahfb-hamburger-menu.toggle').removeClass('is-open');
                $(this).closest('.la-body').find('#hamburger-menu-wrap').removeClass('hm-open');
                $(this).closest('.la-body').removeClass('is-open');
                $('.hamburger-menu-main').getNiceScroll().resize();
            } else {
                $(this).closest('.lahfb-hamburger-menu.toggle').addClass('is-open');
                $(this).closest('.la-body').find('#hamburger-menu-wrap').addClass('hm-open');
                $(this).closest('.la-body').addClass('is-open');
                $('.hamburger-menu-main').getNiceScroll().resize();
            }
        });

        $('#hamburger-nav.toggle-menu').find('li').each(function () {
            var $list_item = $(this);

            if ($list_item.children('ul').length) {
                $list_item.children('a').append('<i class="fa fa-angle-down hamburger-nav-icon"></i>');
            }

            $('> a > .hamburger-nav-icon', $list_item).on('click', function (e) {
                e.preventDefault();
                var $that = $(this);
                if( $that.hasClass('active') ){
                    $that.removeClass('active fa-angle-up').addClass('fa-angle-down');
                    $('>ul', $list_item).stop().slideUp(350);
                }
                else{
                    $that.removeClass('fa-angle-down').addClass('fa-angle-up active');
                    $('>ul', $list_item).stop().slideDown(350);
                }
            })
        });

        //Full hamburger Menu

        $(document)
            .on('click', '.lahfb-hamburger-menu.full .lahfb-icon-element.close-button', function (e) {
                $(this).siblings('.la-hamburger-wrap').addClass('open-menu');
                $(this).removeClass('close-button').addClass('open-button').find('.hamburger-icon').addClass('open');
            })
            .on('click', '.lahfb-hamburger-menu.full .lahfb-icon-element.open-button', function (e) {
                $(this).siblings('.la-hamburger-wrap').removeClass('open-menu');
                $(this).removeClass('open-button').addClass('close-button').find('.hamburger-icon').removeClass('open');
            });


        $('.full-menu').find('li').each(function () {
            var $list_item = $(this);

            if ($list_item.children('ul').length) {
                $list_item.children('a').append('<i class="fa fa-angle-down hamburger-nav-icon"></i>');
            }

            $('> a > .hamburger-nav-icon', $list_item).on('click', function (e) {
                e.preventDefault();
                var $that = $(this);
                if( $that.hasClass('active') ){
                    $that.removeClass('active fa-angle-up').addClass('fa-angle-down');
                    $('>ul', $list_item).stop().slideUp(350);
                }
                else{
                    $that.removeClass('fa-angle-down').addClass('fa-angle-up active');
                    $('>ul', $list_item).stop().slideDown(350);
                }
            })

        });

        $(document).on('click', function (e) {
            var target = $(e.target);
            if (e.target.id == 'la-hamburger-icon' || target.closest('#la-hamburger-icon').length)
                return;
            var $this = $('body');
            if ($this.hasClass('is-open')) {
                $this.find('.lahfb-hamburger-menu.toggle').removeClass('is-open');
                $this.removeClass('is-open');
            }
        });

        $(document).on('click', '#hamburger-menu-wrap', function (e) {
            e.stopPropagation();
        });


        // Topbar search form
        $('.top-search-form-icon').on('click', function () {
            $('.top-search-form-box').addClass('show-sbox');
            $('#top-search-box').focus();
        });
        $(document).on('click', function (ev) {
            var myID = ev.target.id;
            if ((myID != 'top-searchbox-icon') && myID != 'top-search-box') {
                $('.top-search-form-box').removeClass('show-sbox');
            }
        });

        // Responsive Menu
        $('.lahfb-responsive-menu-icon-wrap').on('click', function () {
            var $toggleMenuIcon = $(this),
                uniqid = $toggleMenuIcon.data('uniqid'),
                $responsiveMenu = $('.lahfb-responsive-menu-wrap[data-uniqid="' + uniqid + '"]'),
                $closeIcon = $responsiveMenu.find('.close-responsive-nav');

            if ($responsiveMenu.hasClass('open') === false) {
                $toggleMenuIcon.addClass('open-icon-wrap').children().addClass('open');
                $closeIcon.addClass('open-icon-wrap').children().addClass('open');
                $responsiveMenu.animate({'left': 0}, 350).addClass('open');
            } else {
                $toggleMenuIcon.removeClass('open-icon-wrap').children().removeClass('open');
                $closeIcon.removeClass('open-icon-wrap').children().removeClass('open');
                $responsiveMenu.animate({'left': -265}, 350).removeClass('open');
            }
        });

        $('.lahfb-responsive-menu-wrap').each(function () {
            var $this = $(this),
                uniqid = $this.data('uniqid'),
                $responsiveMenu = $this.clone(),
                $closeIcon = $responsiveMenu.find('.close-responsive-nav'),
                $toggleMenuIcon = $('.lahfb-responsive-menu-icon-wrap[data-uniqid="' + uniqid + '"]');

            // append responsive menu to lastudio header builder wrap
            $this.remove();
            $('#lastudio-header-builder').append($responsiveMenu);

            // add arrow down to parent menus
            $responsiveMenu.find('li').each(function () {
                var $list_item = $(this);

                if ($list_item.children('ul').length) {
                    $list_item.children('a').append('<i class="fa fa-angle-down respo-nav-icon"></i>');
                }

                $('> a > .respo-nav-icon', $list_item).on('click', function (e) {
                    e.preventDefault();
                    var $that = $(this);
                    if( $that.hasClass('active') ){
                        $that.removeClass('active fa-angle-up').addClass('fa-angle-down');
                        $('>ul', $list_item).stop().slideUp(350);
                    }
                    else{
                        $that.removeClass('fa-angle-down').addClass('fa-angle-up active');
                        $('>ul', $list_item).stop().slideDown(350);
                    }
                });
            });

            // close responsive menu
            $closeIcon.on('click', function () {
                if ($toggleMenuIcon.hasClass('open-icon-wrap')) {
                    $toggleMenuIcon.removeClass('open-icon-wrap').children().removeClass('open');
                    $closeIcon.removeClass('open-icon-wrap').children().removeClass('open');
                }
                else {
                    $toggleMenuIcon.addClass('open-icon-wrap').children().addClass('open');
                    $closeIcon.addClass('open-icon-wrap').children().addClass('open');
                }

                if ($responsiveMenu.hasClass('open') === true) {
                    $responsiveMenu.animate({'left': -265}, 350).removeClass('open');
                }
            });
        });

        // Login Dropdown
        $('.lahfb-login').each(function (index, el) {
            $(this).find('.js--trigger-login-dropdown-icon').on('click', function (event) {
                $(this).siblings('#w-login').fadeToggle('fast', function () {
                    if ($("#w-login").is(":visible")) {
                        $(document).on('click', function (e) {
                            var target = $(e.target);
                            if (target.parents('.lahfb-login').length)
                                return;
                            $("#w-login").css({
                                display: 'none',
                            });
                        });
                    }
                });
            });
        });

        $('#loginform input[type="text"]').attr('placeholder', 'Username or Email');
        $('#loginform input[type="password"]').attr('placeholder', 'Password');


        // Contact Dropdown
        $('.lahfb-contact').each(function (index, el) {
            $(this).find('.js--trigger-contact-dropdown').on('click', function (event) {
                $(this).siblings('.la-contact-form-wrap').fadeToggle('fast', function () {
                    if ($(".la-contact-form-wrap").is(":visible")) {
                        $(document).on('click', function (e) {
                            var target = $(e.target);
                            if (target.parents('.lahfb-contact').length)
                                return;
                            $(".la-contact-form-wrap").css({
                                display: 'none',
                            });
                        });
                    }
                });
            });
        });

        // Icon Menu Dropdown
        $('.lahfb-icon-menu-wrap').each(function (index, el) {
            $(this).find('#la-icon-menu-trigger').on('click', function (event) {
                $(this).siblings('.lahfb-icon-menu-content').fadeToggle('fast', function () {
                    if ($(".lahfb-icon-menu-content").is(":visible")) {
                        $(document).on('click', function (e) {
                            var target = $(e.target);
                            if (target.parents('.lahfb-icon-menu-wrap').length)
                                return;
                            $(".lahfb-icon-menu-content").css({
                                display: 'none',
                            });
                        });
                    }
                });
            });
        });


        $('.la-header-wishlist-content-wrap').find('.la-wishlist-total').addClass('colorf');


        /* Profile Socials */
        $('.lahfb-profile-socials-text').hover(function () {
            $(this).closest('.lahfb-profile-socials-wrap').find('.lahfb-profile-socials-icons').removeClass('profile-socials-hide').addClass('profile-socials-show');
        }, function () {
            $(this).closest('.lahfb-profile-socials-wrap').find('.lahfb-profile-socials-icons').removeClass('profile-socials-show').addClass('profile-socials-hide');
        });


        /* Vertical Header */
        // #wrap Class vertical

        if ($('.lahfb-desktop-view').find('.lahfb-row1-area').hasClass('lahfb-vertical-toggle')) {
            $('#page').addClass('lahfb-header-vertical-toggle');
        }
        else if ($('.lahfb-desktop-view').find('.lahfb-row1-area').hasClass('lahfb-vertical')) {
            $('#page').addClass('lahfb-header-vertical-no-toggle');
        }

        $(window).on('load', function (e) {
            setTimeout(function () {
                $(window).trigger('resize');
            }, 100)
        });

        // Toggle Vertical

        $document.on('click', '.vertical-menu-icon-foursome', function (event) {
            event.preventDefault();

            var $vertical_wrap = $('.lahfb-vertical.lahfb-vertical-toggle');
            var $vertical_contact_wrap = $('.lahfb-vertical-contact-form-wrap');

            if ($vertical_wrap.hasClass('is-open')) {
                $vertical_wrap.removeClass('is-open');
                $vertical_wrap.removeClass('lahfb-open-with-delay');
                $(this).siblings('.lahfb-vertical-logo-wrap,.vertical-contact-icon,.vertical-fullscreen-icon').removeClass('is-open');
                $(this).removeClass('is-open');
            }
            else {
                if ($vertical_contact_wrap.hasClass('is-open')) {
                    $vertical_contact_wrap.removeClass('is-open');
                    $vertical_wrap.addClass('lahfb-open-with-delay');
                    $('.vertical-contact-icon i').removeClass('is-open colorf');
                }
                $vertical_wrap.addClass('is-open');
                $(this).siblings('.lahfb-vertical-logo-wrap,.vertical-contact-icon,.vertical-fullscreen-icon').addClass('is-open');
                $(this).addClass('is-open');
            }
        })

        $document.on('click', '.vertical-menu-icon-triad', function (event) {
            event.preventDefault();

            // Toggle Vertical
            var $vertical_wrap = $('.lahfb-vertical.lahfb-vertical-toggle');
            var $vertical_contact_wrap = $('.lahfb-vertical-contact-form-wrap');


            if ($vertical_wrap.hasClass('is-open')) {
                $vertical_wrap.removeClass('is-open');
                $vertical_wrap.removeClass('lahfb-open-with-delay');
                $(this).removeClass('is-open');
            }
            else {
                if ($vertical_contact_wrap.hasClass('is-open')) {
                    $vertical_contact_wrap.removeClass('is-open');
                    $vertical_wrap.addClass('lahfb-open-with-delay');
                    $('.vertical-contact-icon i').removeClass('is-open colorf');
                }
                $vertical_wrap.addClass('is-open');
                $(this).addClass('is-open');
            }

        });

        // Vertical Contact Icon
        $document.on('click', '.vertical-contact-icon i', function (event) {
            event.preventDefault();
            var $vertical_wrap = $('.lahfb-vertical.lahfb-vertical-toggle');
            var $vertical_contact_wrap = $('.lahfb-vertical-contact-form-wrap');

            if ($vertical_contact_wrap.hasClass('is-open')) {
                $vertical_contact_wrap.removeClass('is-open');
                $(this).removeClass('is-open colorf');
            }
            else {
                if ($vertical_wrap.hasClass('is-open')) {
                    $vertical_wrap.removeClass('is-open');
                    $vertical_contact_wrap.addClass('lahfb-open-with-delay');
                    $('.vertical-menu-icon-triad').removeClass('is-open colorf');
                }
                $vertical_contact_wrap.addClass('is-open');
                $(this).addClass('is-open colorf');
            }
        });

        // Vertical Nicescroll
        $('.lahfb-vertical-contact-form-wrap').niceScroll({
            scrollbarid: 'lahfb-vertical-cf-scroll',
            cursorwidth: "5px",
            autohidemode: "hidden",
        });
        $('.lahfb-vertical').find('.lahfb-content-wrap').niceScroll({
            scrollbarid: 'lahfb-vertical-menu-scroll',
            cursorwidth: "5px",
            autohidemode: true
        });

        // Fullscreen Icon
        $document.on('click', '.vertical-fullscreen-icon i', function (e) {
            e.preventDefault();
            var $parent = $(this).closest('.vertical-fullscreen-icon');
            if($parent.hasClass('is-open')){
                $parent.removeClass('is-open');
                $.fullscreen.exit();
            }
            else{
                var site_document = document.documentElement,
                    site_screen = site_document.requestFullScreen || site_document.webkitRequestFullScreen || site_document.mozRequestFullScreen || site_document.msRequestFullscreen;
                if (typeof site_screen != "undefined" && site_screen) {
                    site_screen.call(site_document);
                }
                else if (typeof window.ActiveXObject != "undefined") {
                    // for Internet Explorer
                    var wscript = new ActiveXObject("WScript.Shell");
                    if (wscript != null) {
                        wscript.SendKeys("{F11}");
                    }
                }
            }
        });

        // Vertical Menu
        $('.lahfb-vertical').find('#nav').find('li').each(function () {
            var $list_item = $(this);

            if ($list_item.children('ul').length) {
                $list_item.children('a').removeClass('sf-with-ul').append('<i class="fa fa-angle-down lahfb-vertical-nav-icon"></i>');
            }

            $('> a > .lahfb-vertical-nav-icon', $list_item).on('click', function (e) {
                e.preventDefault();
                var $that = $(this);
                if( $that.hasClass('active') ){
                    $that.removeClass('active fa-angle-up').addClass('fa-angle-down');
                    $('>ul', $list_item).stop().slideUp(350);
                }
                else{
                    $that.removeClass('fa-angle-down').addClass('fa-angle-up active');
                    $('>ul', $list_item).stop().slideDown(350);
                }
            });

        });

        // Buddypress user messages
        $('.la-bp-messages').find('#message-threads').children('li').each(function (index, el) {
            var wrap_element = $(this).data('count');
        });

    };

    LAHFB.core.reloadAllEvents = function(){
        LAHFB.core.init();
        console.log('ok -- reloadAllEvents!');
    };

    $(function () {
        LAHFB.core.init();
    });

})(jQuery);