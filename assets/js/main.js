"use strict";

/*--------------------------------------------------------------
    [TABLE OF CONTENTS]
    --------------------------------------------------------------
    
    01. PRELOADER
    02. HEADER SCROLL
    03. SIDEBAR TOGGLE
    04. MENU SUBMENU TOGGLE
    05. SCROLL TO TOP (ARROW)
    06. SEARCH WRAP SLIDE
    07. DARKMODE INIT
-------------------------------------------------------------------*/

/*----------------------------------------------------------
    01. CUSTOM UTILITIES
------------------------------------------------------------*/
(function ($) {
    // Custom jQuery Utilities
    $.fn.is_exist = function () {
        return this.length > 0;
    };

    $(function () {
        /*----------------------------------------------------------
            01. PRELOADER
        ------------------------------------------------------------*/
        setTimeout(function () {
            if ($('.preloader').length) {
                $('.preloader').fadeOut(200, function () {
                    $(this).remove();
                });
            }
        }, 200); 

        /*----------------------------------------------------------
            02. HEADER SCROLL
        ------------------------------------------------------------*/
        function handleScroll() {
            var $headerWrapper = $(".header-wrapper");
            if ($headerWrapper.length) {
                var upperHeaderHeight = $(".upper-header").length ? $(".upper-header").outerHeight() : 0;

                if ($(window).scrollTop() > upperHeaderHeight) {
                    $headerWrapper.addClass("scroll-header");
                } else {
                    $headerWrapper.removeClass("scroll-header");
                }
            }
        }
        $(window).on("scroll", handleScroll);
        handleScroll();

        /*----------------------------------------------------------
            03. SIDEBAR TOGGLE
        ------------------------------------------------------------*/
        $(".mobile-menu-trigger").on("click", function (e) {
            e.preventDefault();
            $(".menu-block, .menu-overlay, .menu-close").addClass("active");
        });
        $(".menu-close, .menu-overlay").on("click", function () {
            $(".menu-block, .menu-overlay, .menu-close").removeClass("active");
        });

        /*----------------------------------------------------------
            04. MENU SUBMENU TOGGLE
        ------------------------------------------------------------*/
        $(".menu-item-has-children > a").on("click", function (e) {
            e.preventDefault();
            const $parent = $(this).parent();
            const $submenu = $parent.find(".sub-menu").first();
            $(".sub-menu").not($submenu).removeClass("show");
            $(".mega-menu-sub").removeClass("show");
            $submenu.toggleClass("show");
        });
        
        $(".mega-menu-wrap > a").on("click", function (e) {
            e.preventDefault();

            const $parent = $(this).parent();
            const $megamenu = $parent.find(".mega-menu").first();
            // Close other menus ONLY
            $(".mega-menu").not($megamenu).removeClass("show");
            // Toggle current menu
            $megamenu.toggleClass("show");
        });
        
        $(".mega-menu-header").on("click", function (e) {
            e.preventDefault();
            const $mega = $(this).next(".mega-menu-sub");
            $(".mega-menu-sub").not($mega).removeClass("show");
            $(".sub-menu").removeClass("show");
            $mega.toggleClass("show");
        });
        
        // CART QUANTITY
        $(".qty-btn").on("click", function () {
            var $button = $(this);
            var $input = $button.siblings("input");
            var oldValue = parseFloat($input.val()) || 0;
            var newVal;

            if ($button.hasClass("quantity-plus")) {
                newVal = oldValue + 1;
            } else if ($button.hasClass("quantity-minus")) {
                newVal = Math.max(oldValue - 1, 0); // prevent going below 0
            }

            $input.val(newVal);
        });

        /*----------------------------------------------------------
            05. SCROLL TO TOP (ARROW)
        ------------------------------------------------------------*/
        const progressPath = document.querySelector('.arrow-round-wrap path');
        const arrowWrap = document.querySelector('.arrow-round-wrap');

        if (progressPath && arrowWrap) {
            const pathLength = progressPath.getTotalLength();
            progressPath.style.strokeDasharray = `${pathLength} ${pathLength}`;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.style.transition = 'stroke-dashoffset 10ms linear';

            const updateProgress = () => {
                const scroll = window.scrollY;
                const height = document.documentElement.scrollHeight - window.innerHeight;
                const progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
                arrowWrap.classList.toggle('active-arrow', scroll > 50);
            };

            updateProgress();
            window.addEventListener('scroll', updateProgress);
            arrowWrap.addEventListener('click', e => {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }


        /*----------------------------------------------------------
            06. SEARCH WRAP SLIDE
        ------------------------------------------------------------*/
        const $searchBtn = $('#search-btn');
        const $searchWrap = $('.search-wrap');
        const $closeBtn = $('#close-search');

        $searchBtn.on('click', function () {
            $searchWrap.addClass('active');
        });

        $closeBtn.on('click', function () {
            $searchWrap.removeClass('active');
        });

        

        /*----------------------------------------------------------
            07. DARKMODE INIT
        ------------------------------------------------------------*/
        const darkModeClass = "dark-theme";
        const $darkSwitch = $("#dark-switch");

        // Function to swap logos
        function updateLogos() {
            $(".brand-logo").each(function () {
                const $img = $(this);
                const lightSrc = $img.attr("src");
                const darkSrc = $img.data("dark");

                if ($("body").hasClass(darkModeClass)) {
                    // Use dark version
                    $img.attr("src", darkSrc);
                } else {
                    // Use original version (light)
                    $img.attr("src", darkSrc.replace("-w", "")); 
                }
            });
        }

        // Load preference from localStorage
        if (localStorage.getItem("theme") === "dark") {
            $("body").addClass(darkModeClass);
            $darkSwitch.addClass("active");
        }
        updateLogos();

        // Toggle on click
        $darkSwitch.on("click", function () {
            $("body").toggleClass(darkModeClass);

            if ($("body").hasClass(darkModeClass)) {
                localStorage.setItem("theme", "dark");
                $darkSwitch.addClass("active");
            } else {
                localStorage.setItem("theme", "light");
                $darkSwitch.removeClass("active");
            }

            updateLogos();
        });

    });
})(jQuery);
