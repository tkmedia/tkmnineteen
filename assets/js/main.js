var $ = jQuery.noConflict();

jQuery(function($) {

	AOS.init({
	  // Global settings:
	  disable: 'mobile', // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
	  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
	  initClassName: 'aos-init', // class applied after initialization
	  animatedClassName: 'aos-animate', // class applied on animation
	  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
	  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
	  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
	  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
	  
	  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
	  offset: 120, // offset (in px) from the original trigger point
	  delay: 0, // values from 0 to 3000, with step 50ms
	  duration: 1000, // values from 0 to 3000, with step 50ms
	  easing: 'ease-in-out', // default easing for AOS animations
	  once: true, // whether animation should happen only once - while scrolling down
	  mirror: false, // whether elements should animate out while scrolling past them
	  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
	});

	// Sticky Scroll
	$(window).scroll(function(){
		ss_get_top_bar_height();
		function ss_get_top_bar_height(){
			var SSbody = $('body:not(.header-side)'),
				SSheader = $('.site:not(.header-side).sticky-scroll #header-container'),
				//SSmain = $('.non_header_float:not(.header-side).sticky-scroll #main_content'),
				SSheader_height = $('.site:not(.header-side).sticky-scroll #header-container').outerHeight();
		    if ($(window).scrollTop() >= 1) {
			    SSbody.addClass('body-fixed-header');
		        SSheader.addClass('fixed-header');
		        //SSmain.css('padding-top', SSheader_height);
		        $('.woocommerce-page.body-fixed-header #page-title').css('padding-top', SSheader_height);
		        $('.archive-page.body-fixed-header #page-title').css('padding-top', SSheader_height);
		        $('.site:not(.header-side).sticky-scroll #masthead').css('padding-top', SSheader_height);
		    }
		    else {
			    SSbody.removeClass('body-fixed-header');
		        SSheader.removeClass('fixed-header');
		        //SSmain.css('padding-top', '0');
		        $('.woocommerce-page #page-title').css('padding-top', '0');
		        $('.archive-page #page-title').css('padding-top', '0');
		        $('.site:not(.header-side).sticky-scroll #masthead').css('padding-top', '0');
		    }
	    }
	});

	// Sticky Scroll Fixed Mobile
	$(window).scroll(function() {
		ssm_get_top_bar_height();
		function ssm_get_top_bar_height(){
		    if ($(window).width() < 991 ) { 
				var SSMheader = $('.site:not(.header-side):not(.masthead_clean_top).sticky-fixed-mobile #header-container'),
				SSMheader_height = $('.site:not(.header-side).sticky-fixed-mobile #header-container').outerHeight(),
				SSMmasthesd = $('.site:not(.header-side):not(.masthead_clean_top).sticky-fixed-mobile #masthead');
				
		        if ($(window).scrollTop() >= 1) {
		            SSMmasthesd.css('padding-top', SSMheader_height);
		            $(".navbar1").css({
		               'height':'150px',
		            });
		        } else {
		            SSMmasthesd.css('padding-top', '0');
		            $(".navbar1").css({
		                'height':'250px',
		            });
		        }
		    }
	    }
	});	

	// Sticky Fixed - Non Float Header With top bar
	$(window).scroll(function(){
		sftb_get_top_bar_height();
		function sftb_get_top_bar_height(){
			var SFTBbody = $('body:not(.header-side)'),
				SFTBheader = $('.non_header_float:not(.header-side).sticky-fixed #header-container'),
				SFTBheaderTB = $('.non_header_float:not(.header-side).sticky-fixed #header-container.show_top_bar'),
				SFTBtop_bar = $('.non_header_float:not(.header-side).sticky-fixed #header_top_bar').outerHeight(true),
				SFTBheader_height = $('.non_header_float:not(.header-side).sticky-fixed #header-container').outerHeight(true);
		    if ($(window).scrollTop() >= SFTBtop_bar) {
		        SFTBheader.addClass('fixed-header');
		        SFTBbody.addClass('body-fixed-header');
		        SFTBheaderTB.css('top', -SFTBtop_bar);
		        $('.woocommerce-page.body-fixed-header #page-title').css('padding-top', SFTBheader_height);
		        $('.archive-page.body-fixed-header #page-title').css('padding-top', SFTBheader_height);
		        $('.site:not(.header-side):not(.masthead_clean_top).sticky-fixed #masthead').css('padding-top', SFTBheader_height);
		    }
		    else {
			    SFTBbody.removeClass('body-fixed-header');
		        SFTBheader.removeClass('fixed-header');
		        SFTBheader.css('top', '0');
		        $('.woocommerce-page #page-title').css('padding-top', '0');
		        $('.archive-page #page-title').css('padding-top', '0');
		        $('.site:not(.header-side):not(.masthead_clean_top).sticky-fixed #masthead').css('padding-top', '0');
		    }
	    }
	});
	// Sticky Fixed - Non Float Header No top bar
	$(window).scroll(function(){
		sf_get_top_bar_height();
		function sf_get_top_bar_height(){
			var SFbody = $('body:not(.header-side)'),
				SFheader = $('.non_header_float:not(.header-side).sticky-fixed #header-container.no_top_bar'),
				SFTBheader_height = $('.non_header_float:not(.header-side).sticky-fixed #header-container.no_top_bar').outerHeight(true);

		    if ($(window).scrollTop() >= 1) {
		        SFheader.addClass('fixed-header');
		        SFbody.addClass('body-fixed-header');
		        $('.woocommerce-page.body-fixed-header #page-title').css('padding-top', SFTBheader_height);
		        $('.archive-page.body-fixed-header #page-title').css('padding-top', SFTBheader_height);
		        $('.site:not(.header-side):not(.masthead_clean_top).sticky-fixed #masthead').css('padding-top', SFTBheader_height);
		    }
		    else {
		        SFheader.removeClass('fixed-header');
		        SFbody.removeClass('body-fixed-header');
		        $('.archive-page #page-title').css('padding-top', '0');
		        $('.archive-page #page-title').css('padding-top', '0');
		        $('.site:not(.header-side):not(.masthead_clean_top).sticky-fixed #masthead').css('padding-top', '0');
		    }
	    }
	});

	// Sticky Fixed - Float Header
	$(window).scroll(function(){
		sff_get_top_bar_height();
		function sff_get_top_bar_height(){
			var sff_header_top_bar = $('.site:not(.header-side) #header_top_bar').outerHeight(),
			sff_header = $('.site:not(.header-side) #header-container').outerHeight(),
			sff_headerTB = $('.site.header_float:not(.header-side).sticky-fixed.header_float.masthead_no_image_top #header-container.show_top_bar, .woocommerce-page .site.header_float:not(.header-side).sticky-fixed.header_float #header-container.show_top_bar'),
			sff_header_bar = $('.site.header_float:not(.header-side).sticky-fixed #header_bar').outerHeight();
		    //if ($(window).scrollTop() >= sff_header_top_bar) {
			if ($(window).scrollTop() >= 60) {
		        $('.site.header_float:not(.header-side).sticky-fixed.header_float #header-container').addClass('fixed-header');
		        $('.site.header_float:not(.header-side).sticky-fixed.header_float').addClass('fixed-header');
		        $('.site.header_float:not(.header-side).sticky-fixed.header_float .hamburger').addClass('fixed-float-header');
		        $('.site.header_float:not(.header-side).sticky-fixed.header_float.fixed-header.masthead_no_image_top #masthead, .woocommerce-page .site.header_float:not(.header-side).sticky-fixed.header_float.fixed-header #page-title').css('padding-top', sff_header);
		        sff_headerTB.css('top', -sff_header_top_bar);
		    }
		    else {
		        $('.site.header_float:not(.header-side).sticky-fixed.header_float #header-container').removeClass('fixed-header');
		        $('.site.header_float:not(.header-side).sticky-fixed.header_float').removeClass('fixed-header');
		        $('.site.header_float:not(.header-side).sticky-fixed.header_float .hamburger').removeClass('fixed-float-header');
		        $('.site.header_float:not(.header-side).sticky-fixed.header_float.masthead_no_image_top #masthead, .woocommerce-page .site.header_float:not(.header-side).sticky-fixed.header_float #page-title').css('padding-top', '0');
		        sff_headerTB.css('top', '0');
		    }
	    }
	});


	var $head = $('.site:not(.header-side).sticky-fixed.header_float #header-container')
	$head.waypoint(function(direction) {
		if( direction === 'down' ) {
			//$head.attr('class', 'ha-header animClassDown');
			$head.addClass('fixed-header2');
		}  
		else if( direction === 'up' ){
			//$head.attr('class', 'ha-header animClassUp');
			$head.removeClass('fixed-header2');
		}
	}, { offset: '25%' });
	
		
	'use strict';
	var c, currentScrollTop = 0,
		mainHeader = $('.site:not(.header-side).sticky-scroll #header-container');
		mainHamburger = $('.site:not(.header-side).sticky-scroll .hamburger');
		mainHamburgerOuter = $('.site:not(.header-side).sticky-scroll .hamburger-menu-outer');
		
	
	$(window).scroll(function () {
		var a = $(window).scrollTop();
		var b = mainHeader.height();
	 
		currentScrollTop = a;
	 
		if (c < currentScrollTop && a > b + b) {
			mainHeader.addClass("is_hidden");
			mainHamburger.addClass("is_hidden");
			mainHamburgerOuter.addClass("is_hidden");
		} else if (c > currentScrollTop && !(a <= b)) {
			mainHeader.removeClass("is_hidden");
			mainHamburger.removeClass("is_hidden");
			mainHamburgerOuter.removeClass("is_hidden");
		}
		c = currentScrollTop;
	});

	// Sticky Nav Only
	$(window).scroll(function(){
		get_header_wrapper_height();
		function get_header_wrapper_height(){
			var header_wrapper_height = $('.header_wrapper').outerHeight();
		    if ($(window).scrollTop() >= header_wrapper_height) {
		        $('.header_menu_container_wrap').addClass('fixed-header');
		    }
		    else {
		        $('.header_menu_container_wrap').removeClass('fixed-header');
		    }
	    }
	});
	    
	// Auto Padding content top
	//$(window).load(function(){
	//	get_header_height();
	    //function to get current div height
	//    function get_header_height(){
	        //var footer_height = $('#footer_container').height();
	//        var header_height = $('.absoluteHeader, .sticky_header').outerHeight();
	//        $('#main_content').css('padding-top', header_height);
	//    }
    //});	

	// Contact form 7 validation effect
	$(".wpcf7").on('wpcf7:mailsent', function(event){
	    if (typeof ga == 'function') {
	        ga('send', 'event', 'השארת פרטים', 'שליחה');
	    } else {
	        console.log('Analytics not connected');
	    }
	    setTimeout(function() {
	        $('.wpcf7-response-output').addClass('form_msg_error_out').fadeOut();
	        setTimeout(function() {
	            $('.wpcf7-response-output').removeClass('wpcf7-mail-sent-ok').removeClass('form_msg_error_out');
	        }, 600);
	    }, 3500);
	});
	
	$('input[type=text], input[type=email], input[type=tel], textarea').bind('focus',function(){
	    if ($(this).parent().find('.wpcf7-not-valid-tip').length != 0) {
	        $('.wpcf7-not-valid-tip').addClass('tip_out');
	        $('.wpcf7-response-output').removeClass('div.wpcf7-validation-errors');
	        setTimeout(function(){
	            $('.wpcf7-not-valid-tip').remove();
	            $('.wpcf7-response-output').removeClass('wpcf7-validation-errors').removeClass('form_msg_error_out');
	        }, 600)
	    }
	});

    $("#popop-mmh #next-step3").click(function(){
		$('#popop-mmh form.wpcf7-form').find('.wpcf7-submit').trigger( "submit" );      
    });

    
/* Page Element Blocks */
/* ---------------------------------------------------------------------- */	

$(".header_search_icon").click(function(){
	$(".header_left_contact").toggleClass('hide_elemnt');
	$(".header_search").toggleClass('hide_elemnt');
	//$(".header_search_form").animate({
	//	width: "toggle"
	//});
	//$(".header_search_form").toggle(500);
	//$(".header_left_contact").toggle(500);
	//$(".header_left_contact").animate({
	//	width: "toggle"
	//});
	
});

	//* ## CSS Object-fit IE */
	var userAgent, ieReg, ie;
	userAgent = window.navigator.userAgent;
	ieReg = /msie|Trident.*rv[ :]*11\./gi;
	ie = ieReg.test(userAgent);
	IEobjectfitContain = $('.masonary_grid_link.grid_features .img_top .grid-item .grid-item-inner-img, .masonary_grid_link.grid_features .img_bottom .grid-item .grid-item-inner-img, .articles_grid_item_row.cat_page_slider .page_img, .masonary_grid_link.grid_contact_boxes .layout .grid-item .grid-item-inner-img, footer .new_products_item_img, .articles_grid_item_container .page_img, .product_main_slider .gallery-top .slide-inner');
	IEobjectfitCover = $('.flex_image_img.img_cover, #home_masthead .single-slider-objectfit, .articles_grid_item_row.cat_slider_box .page_img, .product_main_slider .gallery-thumbs .slide-inner, .gallery_slider .gallery_slide_item .gallery_slide_item_img, .layout .grid-item .grid-item-inner-img, .media_content_item.full_image.image_style_cover .full_image_img, .masonary_grid_link.source_gallery .layout.layout1 .grid-item-inner, .masonary_grid_link.source_gallery .layout.layout2 .grid-item-inner');
	
	if(ie) {
		IEobjectfitCover.each(function () {
			var $container = $(this),
			    imgUrl = $container.find("img").prop("src");
			if (imgUrl) {
			  $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("cover-object-fit");
			}
		});
		
		IEobjectfitContain.each(function () {
			var $container = $(this),
			    imgUrl = $container.find("img").prop("src");
			if (imgUrl) {
			  $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("contain-object-fit");
			}
		});
	}

	objectfitCover = $('');
	objectfitContain = $('.client_slider_wrap.type-from-page-repeater .client_slide_item_inner .client_slide_item_img .client_img');
	objectfitCover.each(function () {
		var $container = $(this),
		    imgUrl = $container.find("img").prop("src");
		if (imgUrl) {
		  $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("cover-object-fit");
		}
	});
	objectfitContain.each(function () {
		var $container = $(this),
		    imgUrl = $container.find("img").prop("src");
		if (imgUrl) {
		  $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("contain-object-fit");
		}
	});

	//* ## MastHead full manual - slick*/
	if ($('.masthesd_full_manual .home_main_slider .home_main_slider_item').length > 1) {
		$(".masthesd_full_manual .home_main_slider").slick({
			rtl: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover: false,
			speed: 900,
			autoplay: true,
			autoplaySpeed: 5000,
			arrows: false,
			dots: true,
			//cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			draggable: true,
			//fade: true,
			infinite: true,
			touchThreshold: 100,
			responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        adaptiveHeight: true,
		        autoplay: true,
		      }
		    }
			]
		});
	}

	//* ## MastHead full Image - slick*/
	if ($('.masthead_img_slider .single-slider .single-slider-item').length > 1) {
		$(".masthead_img_slider .single-slider").slick({
			rtl: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover: true,
			speed: 900,
			autoplay: false,
			autoplaySpeed: 6000,
			arrows: false,
			dots: true,
			//cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			draggable: true,
			//fade: true,
			infinite: true,
			touchThreshold: 100
		});
	}
    
	//* ## Home Main slider */
	var topSliderCount = $('#top-slider.style2').find('.swiper-slide').length;
	var interleaveOffset = 0.5;
	if(topSliderCount>1){
		var topSlider1 = new Swiper('#top-slider.style2.swiper-container', {
			//direction: 'vertical',
			pagination: {
				el: '#js-pagevertical1',
				clickable: true,
			},
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			watchOverflow: true,
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '#js-next1',
				prevEl: '#js-prev1',
			},
			on: {
				progress: function() {
					var swiper = this;
					for (var i = 0; i < swiper.slides.length; i++) {
						var slideProgress = swiper.slides[i].progress;
						var innerOffset = swiper.width * interleaveOffset;
						var innerTranslate = slideProgress * innerOffset;
						swiper.slides[i].querySelector(".slide-inner").style.transform =
						  "translate3d(" + innerTranslate + "px, 0, 0)";
					}      
				},
				touchStart: function() {
					var swiper = this;
					for (var i = 0; i < swiper.slides.length; i++) {
						swiper.slides[i].style.transition = "";
					}
				},
				setTransition: function(speed) {
					var swiper = this;
					for (var i = 0; i < swiper.slides.length; i++) {
						swiper.slides[i].style.transition = speed + "ms";
						swiper.slides[i].querySelector(".slide-inner").style.transition =
							speed + "ms";
					}
				}
			},
			breakpoints: {
				768: {
					navigation: false,
					pagination: {
						el: '#js-pagevertical1',
						clickable: true,
					},

		        }
			}
		});
		$('#js-pagevertical1').show();
		$('#js-next1').show();
        $('#js-prev1').show();


    }
	// document.querySelector('[data-toggle]').addEventListener('click', function(){
	//   if (swiper.realIndex == 0) {
	//     swiper.slideTo(swiper.slides.length - 1);
	//   } else {
	//     swiper.slideTo(0);
	//   }
	// });
	
	// function logIndex () {
	//   requestAnimationFrame(logIndex);
	//   console.log(swiper.realIndex);
	// }
	// logIndex();

	//* ## Home Main slider - style 2 */
    let options1 = {};
    
    if ( $("#top-slider.style1 > .swiper-slide").length > 1 ) {
        options1 = {
            direction: 'horizontal',
            loop: true,
            autoplayDisableOnInteraction: false,
			pagination: {
				el: '#js-pagevertical1',
				clickable: true,
			},
			navigation: {
				nextEl: '#js-next1',
				prevEl: '#js-prev1',
			},
            paginationClickable: true,
            fadeEffect: {
	            crossFade: true
            },
			loop: true,
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			effect: 'fade',          
           
            
        }
        $('#js-next1').show();
        $('#js-prev1').show();
        $('#js-pagevertical1').show();
    } else {
        options1 = {
            loop: false,
            autoplay: false,
            watchOverflow: true,
            navigation: false,
        }
    }
    var topSlider2 = new Swiper('#top-slider.style1.swiper-container', options1);			    						
    
    //* ## Home Main slider - style 3 */
	var topSliderCount = $('#top-slider.style3').find('.swiper-slide').length;
	var interleaveOffset = 0.5;
	if(topSliderCount>1){
		var topSlider3 = new Swiper('#top-slider.style3.swiper-container', {
			effect: 'fade',
			pagination: {
				el: '#js-pagevertical1',
				clickable: true,
			},
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			watchOverflow: true,
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '#js-next1',
				prevEl: '#js-prev1',
			},
			breakpoints: {
				768: {
					navigation: false,
					pagination: {
						el: '#js-pagevertical1',
						clickable: true,
					},

		        }
			}
		});
		$('#js-pagevertical1').show();
		//$('#js-next1').show();
        //$('#js-prev1').show();
    }
	
    let optionssplit = {};
    
    if ( $(".masthead_split .swiper-slide").length > 1 ) {
        optionssplit = {
            //direction: 'horizontal',
            loop: true,
            slidesPerView : 1,
            autoplayDisableOnInteraction: false,
			pagination: {
				el: '.masthead_split .swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.masthead_split .swiper-button-next',
				prevEl: '.masthead_split .swiper-button-prev',
			},
            paginationClickable: true,
            fadeEffect: {
	            crossFade: true
            },
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			//effect: 'fade',  
			breakpoints: {
				520: {
					slidesPerView : 1,
		        },
				768: {
					slidesPerView : 2,
		        }
			}
			        
        }
        //$('.masthead_split .swiper-button-next').show();
        //$('.masthead_split .swiper-button-prev').show();
    } else {
        optionssplit = {
            loop: false,
            slidesPerView : 1,
            autoplay: false,
            watchOverflow: true,
            navigation: false,
        }
    }
    var topSlidersplit = new Swiper('.masthead_split .swiper-container ', optionssplit);	
    
    if ( $(".masthead_split .swiper-slide:not(.swiper-slide-duplicate)").length > 1 ) {
        $('.masthead_split .swiper-button-next').show();
        $('.masthead_split .swiper-button-prev').show();
        $('.masthead_split .swiper-pagination').show();		    
    }
    
    if ($(window).width() < 991) {
	    if ( $(".masthead_split .swiper-slide:not(.swiper-slide-duplicate)").length > 1 ) {
			$('.masthead_split .swiper-pagination').show();
	    }
    }							

							
	$('.footer-content-wrap.two > .footer-content-col').addClass('col-sm-6');
	$('.footer-content-wrap.three > .footer-content-col').addClass('col-sm-4');
	$('.footer-content-wrap.four > .footer-content-col').addClass('col-sm-3');
	
	// Popup contact form
	$('.form_popup_link').magnificPopup({
		type:'inline',
		midClick: true,
		callbacks: {
			beforeOpen: function() {
			   this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
		removalDelay: 500,
	});	

	$('.grid_gallery1').magnificPopup({
		type: 'image',
		delegate: 'a',
		midClick: true,
		removalDelay: 300,
		mainClass: 'mfp-fade',
		gallery: {
			enabled: true, // set to true to enable gallery
			preload: [0,2], // read about this option in next Lazy-loading section
			navigateByImgClick: true,
			arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
			tPrev: 'הקודם', // title for left button
			tNext: 'הבא', // title for right button
			tCounter: '<span class="mfp-counter">%curr% מתוך %total%</span>' // markup of counter
		},
		tClose: 'סגור', // Alt text on close button
		tLoading: 'טוען...', // Text that is displayed during loading. Can contain %curr% and %total% keys
		image: {
		tError: '<a href="%url%">התמונה</a> לא ניתנת לתצוגה' // Error message when image could not be loaded
		},
		ajax: {
		tError: '<a href="%url%">התוכן</a> לא ניתן לתצוגה' // Error message when ajax request failed
		}	
	});

	// Init fancybox
	$('[data-fancybox="gallery"]').fancybox({
		//selector : '.gallery_slider .swiper-wrapper a',
		thumbs   : {
			//autoStart : true
		},
		loop: false,
		backFocus : false,
		hash     : false,
		//animationEffect : "fade",
		//beforeClose : function(instance) {
			// This is index of current fancyBox slide
			//console.info( instance.currIndex  );
			// Update position of the slider
			//mySwiper.slideTo( instance.currIndex, 0 );
		//},
		buttons: [
			"zoom",
			"share",
			"slideShow",
			"fullScreen",
			"download",
			"thumbs",
			"close"
		],
		lang: "he",
		i18n: {
		he: {
		  CLOSE: "סגור",
		  NEXT: "הבא",
		  PREV: "הקודם",
		  ERROR: "The requested content cannot be loaded. <br/> Please try again later.",
		  PLAY_START: "התחל מצגת",
		  PLAY_STOP: "השהה מצגת",
		  FULL_SCREEN: "מסך מלא",
		  THUMBS: "תמונות מוקטנות",
		  DOWNLOAD: "הורד",
		  SHARE: "שתפו",
		  ZOOM: "זום"
		}
		}
	});


	// Popup contact form
	$('.form_popup_link').magnificPopup({
		type:'inline',
		midClick: true,
		callbacks: {
			beforeOpen: function() {
			   this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
		removalDelay: 500,
	});

	// init Masonry
	var $grid = $('.grid').masonry({
	  itemSelector: '.grid-item',
	  percentPosition: true,
	  columnWidth: '.grid-sizer'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
	  $grid.masonry();
	}); 

	//* ## add Accordion Accessible
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').attr('tabindex', '0');
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_text').attr('aria-hidden', 'true');
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_title').attr('aria-expanded', 'false');
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_text').attr('aria-expanded', 'false');
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').click(function(){
		if($(this).children('.accordion_item_text').attr('aria-hidden') == 'true') {
			$(this).children('.accordion_item_text').attr('aria-hidden', 'false');
			$(this).children('.basic').attr('aria-expanded', 'true');
			$(this).children('.accordion_item_text').attr('aria-expanded', 'ture');
			$(this).children('.accordion_item_title').addClass('q_open');
		} else {
			$(this).children('.accordion_item_text').attr('aria-hidden', 'true');
			$(this).children('.basic').attr('aria-expanded', 'false');
			$(this).children('.accordion_item_text').attr('aria-expanded', 'false');
			$(this).children('.accordion_item_title').removeClass('q_open');
		}
		//$(this).children('.accordion_item_text').slideToggle();
	});
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').on("keydown", function(ev){ if (ev.which == 13) { $(this).click(); } });
	
	//* ## Page content Accordion  Style 01 
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').attr('tabindex', '0');
	$('.acc-style1 .content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_text').attr('aria-hidden', 'true');
	$('.acc-style1 .content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_title').attr('aria-expanded', 'false');
	$('.acc-style1 .content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_text').attr('aria-expanded', 'false');
	$('.acc-style1 .content_accordion_col > .content_accordion_subcol > .content_accordion_item').click(function(){
		if($(this).children('.accordion_item_text').attr('aria-hidden') == 'true') {
			$(this).children('.accordion_item_text').attr('aria-hidden', 'false');
			$(this).children('.basic').attr('aria-expanded', 'true');
			$(this).children('.accordion_item_text').attr('aria-expanded', 'ture');
			$(this).children('.accordion_item_title').addClass('q_open');
		} else {
			$(this).children('.accordion_item_text').attr('aria-hidden', 'true');
			$(this).children('.basic').attr('aria-expanded', 'false');
			$(this).children('.accordion_item_text').attr('aria-expanded', 'false');
			$(this).children('.accordion_item_title').removeClass('q_open');
		}
		//$(this).children('.accordion_item_text').slideToggle();
	});
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').on("keydown", function(ev){ if (ev.which == 13) { $(this).click(); } });

	
	//* ## Page Accordion Q&A split 2 columns (Option #2)
	/*
	var $li = $('.page_qa_col > .page_qa_item'),
	    half = Math.floor($li.length/2);
	
	$li.filter(function(i){ return i < half; }).wrapAll('<div class="page_qa_subcol col-sx-12 col-sm-6">');
	$li.filter(function(i){ return i >= half; }).wrapAll('<div class="page_qa_subcol col-sx-12 col-sm-6">');
	*/
	
	
	//* ## Vertical Tab */
	$('.fc_VerticalTab').easyResponsiveTabs({
		type: 'vertical', //Types: default, vertical, accordion
		width: 'auto', //auto or any width like 600px
		fit: true, // 100% fit in a container
		closed: '', // accordion or '' Start closed if in accordion view
		tabidentify: 'hor_1', // The tab groups identifier
		active_Hash: false,// activate hash
		inactive_bg: '#f9f9f9',
		activate: function(event) { // Callback function if tab is switched
			var $tab = $(this);
			var $info = $('#nested-tabInfo2');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
		}
	});

	//* ## Horizontal Tab */   
    $('.HorizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        tabidentify: 'hor_1', // The tab groups identifier
		active_Hash: false,// activate hash
        activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#nested-tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });
	
	//* ## Product gallery */
	var galleryThumbs = new Swiper('.gallery-thumbs', {
		spaceBetween: 0,
		slidesPerView: 2,
		loop: true,
		freeMode: true,
		loopedSlides: 5, //looped slides should be the same
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
		spaceBetween: 0,
		loop:true,
		loopedSlides: 5, //looped slides should be the same
		navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
		},
		thumbs: {
			swiper: galleryThumbs,
		},
    });
    
	// Product jsSocials
    $(".product_share").jsSocials({
        shares: ["email", "whatsapp", "facebook"],
        showLabel: false,
        showCount: "inside",
        shareIn: "popup"
    });

	// Footer jsSocials
    $(".footer_share").jsSocials({
        shares: ["email", "twitter", "pinterest", "whatsapp", "facebook"],
        showLabel: false,
        showCount: "inside",
        shareIn: "popup"
    });

	// Product Slider
    let optionsProduct = {};
    
    if ( $(".split_hero .swiper-slide").length > 1 ) {
        optionsProduct = {
            //direction: 'horizontal',
            loop: true,
            slidesPerView : 1,
            autoplayDisableOnInteraction: false,
			pagination:false,
			navigation: {
				nextEl: '.split_hero #js-next-s',
				prevEl: '.split_hero #js-prev-s',
			},
            paginationClickable: true,
            fadeEffect: {
	            crossFade: true
            },
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			//effect: 'fade',  
			breakpoints: {
				768: {
					slidesPerView : 1,
		        }
			}
			        
        }
        $('.split_hero #js-next-s').show();
        $('.split_hero #js-prev-s').show();
    } else {
        optionsProduct = {
            loop: false,
            slidesPerView : 1,
            autoplay: false,
            watchOverflow: true,
            navigation: false,
        }
    }
    var topSliderProduct = new Swiper('.top-product-slider', optionsProduct);									

	// Flex page grid - style 3
	var $grid_item_skip = $('.page_link_grid_wrap.grid_style3 .page_link_grid_item:nth-child(3n+1)');
	$grid_items = $(".page_link_grid_wrap.grid_style3 .page_link_grid_item").not('.page_link_grid_wrap.grid_style3 .page_link_grid_item:nth-child(3n+1)');
	$grid_item_skip.addClass('check1');
	$grid_items.addClass('check2');

	// Flex page grid - style 3
	for (var i = 0; i < $grid_items.length; i += 2) {
	  $grid_items.slice(i, i + 2).wrapAll('<div class="grid_item_wrap wrap_' + (i > 0 && i % 2 == 0 && i % 4 != 0 ? 'offsetRow' : '') + '"><div class="grid_item_row row-flex"></div></div>')
	}

	// Flex timeline 
	$(window).load(function(){
		get_timeline_height();
	    function get_timeline_height(){
	        var time_height = $('.timeline_block_row_wrap').outerHeight();
	        $('.timeline_block_item_top').css('height','calc(' + time_height + 'px - 40px)');
	        $('.timeline_block_item_bottom').css('height','calc(' + time_height + 'px - 40px)');
	    }
	});	


	// Typewriter
	let myTypeItInstance = new TypeIt('.typewriter', {
	  //strings: "This will be typed!"
	});
	
	myTypeItInstance.go();

		//* ## Page Accordion Q&A split 2 columns (Option #1)
	    $.fn.splitList = function() {
	        var that = this,
	            li = $('.content_page_qa .page_qa_two_item', that),
	            len = li.length,
	            half = Math.round(len / 2);
	            //half = Math.floor(len / 2);
	        return that.each(function() {
	            li.slice(0, half).wrapAll('<div class=".content_page_qa page_qa_subcol col-sx-12 col-sm-6"></div>');
	            li.slice(half, len).wrapAll('<div class=".content_page_qapage_qa_subcol col-sx-12 col-sm-6"></div>');
	        });
	    };
	    $( ".content_page_qa .page_qa_one_item" ).wrapAll( "<div class='page_qa_subcol' />");
	    
		$('.content_page_qa .page_qa_col').splitList();
		
		//* ## Page Accordion Q&A - with split 2 columns .page_qa_subcol
		$('.content_page_qa> .page_qa_col > .page_qa_subcol > .page_qa_item').attr('tabindex', '0');
		$('.content_page_qa .page_qa_col > .page_qa_subcol > .page_qa_item > .page_qa_item_answer').attr('aria-hidden', 'true');
		$('.content_page_qa .page_qa_col > .page_qa_subcol > .page_qa_item > .page_qa_item_question').attr('aria-expanded', 'false');
		$('.content_page_qa .page_qa_col > .page_qa_subcol > .page_qa_item > .page_qa_item_answer').attr('aria-expanded', 'false');
		$('.content_page_qa .page_qa_col > .page_qa_subcol > .page_qa_item').click(function(){
			if($(this).children('.page_qa_item_answer').attr('aria-hidden') == 'true') {
				$(this).children('.page_qa_item_answer').attr('aria-hidden', 'false');
				$(this).children('.basic').attr('aria-expanded', 'true');
				$(this).children('.page_qa_item_answer').attr('aria-expanded', 'ture');
				$(this).children('.page_qa_item_question').addClass('q_open');
			} else {
				$(this).children('.page_qa_item_answer').attr('aria-hidden', 'true');
				$(this).children('.basic').attr('aria-expanded', 'false');
				$(this).children('.page_qa_item_answer').attr('aria-expanded', 'false');
				$(this).children('.page_qa_item_question').removeClass('q_open');
			}
			$(this).children('.page_qa_item_answer').slideToggle();
		});
		$('.content_page_qa .page_qa_col > .page_qa_subcol > .page_qa_item').on("keydown", function(ev){ if (ev.which == 13) { $(this).click(); } });
		

	    $('#header_form_popup1 [type="radio"]').on('change', function() {
	        $(this)
	        .prev().toggleClass('active')
	        //.siblings().removeClass('active');
	    });

        $("#header_form_popup span.wpcf7-list-item").click(function(){
        var radioValue = $("input:checked").val();
           if(radioValue){
               $("#header_form_popup span.wpcf7-list-item").removeClass("checked");
               $(this).toggleClass("checked");
            }
        });
	
	/* ---------------------------------------------------------------------- */
	/* -------------------- WOOCOMMERCE ------------------------------------- */
	/* ---------------------------------------------------------------------- */

	$(".cart-collaterals-col-inner").stick_in_parent({
	    offset_top: 10
	});

	// Category Page - Wrap subcaregories / products lists
	$( ".subcategory_item" ).wrapAll( "<div id='subcategory_container'><div class='subcategory_container wrap'><div class='subcategory archive_product_loop row-flex'></div></div>");
	$( ".subcategory_product_item" ).wrapAll( "<div class='category_product_container wrap'><div class='products archive_product_loop row-flex'></div></div>");

	//Shop page wrap every 2 categories
	var sections = $(".archive_product_loop.two_col_cat > .archive_product_item");
	for (var i = 0; i < sections.length; i += 2) {
	    sections.slice(i, i + 2).wrapAll("<div class='archive_product_wrapper row-flex'></div>");
	}
	
    //Mini-cart popup
	var $document = $(document),
		$page = $("#main_content"),
		$cartHead = $("#mini-cart .cart-head"),
	    $cartPopup = $("#mini-cart .cart-popup"),
	    $cartClose = $("#mini-cart .widget_shopping_cart_head");
	
	$cartHead.on("click", function (e){
		e.preventDefault();
		var $this = $(this);

		if ($this.hasClass("active")){
			$this.removeClass("active");
			$cartPopup.removeClass("open").addClass("close").slideUp(350);
		}else{
			$this.addClass("active");
			$cartPopup.addClass("open").removeClass("close").slideDown(350);
		};
		$page.on("click", function (){
			$cartHead.removeClass("active");
			$cartPopup.removeClass("open").addClass("close").slideUp(350);
		});		
		$cartClose.on("click", function (){
			$cartHead.removeClass("active");
			$cartPopup.removeClass("open").addClass("close").slideUp(350);
		});
	});

    //Mini-cart popup
	//var $document = $(document),
	//	$page = $("#main_content)"),
	//	$cartHead = $("#mini-cart .cart-head"),
	//    $cartPopup = $("#mini-cart .cart-popup"),
	//    $cartClose = $("#mini-cart .widget_shopping_cart_head"),
	//   $addBtn = $(".woo_product_link.woocommerce a.button");
	
	//$cartHead.on("click", function (e){
	//	e.preventDefault();
	//	var $this = $(this);
//
	//	if ($this.hasClass("active")){
	//		$this.removeClass("active");
	//		$cartPopup.removeClass("open").addClass("close").slideUp(350);
	//	}else{
	//		$this.addClass("active");
	//		$cartPopup.addClass("open").removeClass("close").slideDown(350);
	//	};
	//	$page.on("click", function (){
	//		$cartHead.removeClass("active");
	//		$cartPopup.removeClass("open").addClass("close").slideUp(350);
	//	});		
	//	$cartClose.on("click", function (){
	//		$cartHead.removeClass("active");
	//		$cartPopup.removeClass("open").addClass("close").slideUp(350);
	//	});
	//});

    //Mini-cart popup
	//var $document1 = $(document),
	//	$cartHead1 = $("#mini-cart .cart-head"),
	//    $cartPopup1 = $("#mini-cart .cart-popup"),
	//    $cartClose1 = $("#mini-cart .widget_shopping_cart_head"),
	//    $addBtn = $(".woo_product_link.woocommerce a.button");
	
	//$addBtn.on("click", function (e){
	//	e.preventDefault();
	//	var $this = $(this);
	//		$cartHead1.addClass("active");
	//		$cartPopup1.addClass("open").removeClass("close").slideDown(350);
	//	$cartClose1.on("click", function (){
	//		$cartHead1.removeClass("active");
	//		$cartPopup1.removeClass("open").addClass("close").slideUp(350);
	//	});
	//});

    //Checkout page - slide open order list review
	var $OPbtn = $("#order-products-btn span"),
		$OPlist = $(".woocommerce-checkout-review-order");
	
	$OPbtn.on("click", function (e){
		e.preventDefault();
		var $this = $(this);

		if ($this.hasClass("active")){
			$this.removeClass("active");
			$OPlist.removeClass("open").addClass("close");
		}else{
			$this.addClass("active");
			$OPlist.addClass("open").removeClass("close");
		};
	});
	
	//Ajax-ify add to cart variations button
	"use strict";

	$('.single_add_to_cart_button1').click(function (e) {
		var $thisbutton = $( this );
		e.preventDefault();
		$thisbutton.removeClass( 'added' );
		var id = $(this).next().next().attr('value');
		var data = {
			product_id: id,
			quantity: 1
		};
		$(this).parent().addClass('loading');
		$thisbutton.addClass( 'loading' );
		$.post(wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add_to_cart'), data, function (response) {

			if (!response) {
		        return;
			}
			if (response.error) {
				alert("Custom Massage ");
				$('.custom_add_to_cart').parent().removeClass('loading');
				return;
			}
			if (response) {
	
				var url = woocommerce_params.wc_ajax_url;
				url = url.replace("%%endpoint%%", "get_refreshed_fragments");
				$.post(url, function (data, status) {
					$(".woocommerce.widget_shopping_cart").html(data.fragments["div.widget_shopping_cart_content"]);
					if (data.fragments) {
						jQuery.each(data.fragments, function (key, value) {
	
							jQuery(key).replaceWith(value);
						});
					}
					jQuery("body").trigger("wc_fragments_refreshed");
		        });
		        $('.custom_add_to_cart').parent().removeClass('loading');
		        $thisbutton.removeClass( 'loading' );
		        $thisbutton.addClass( 'added' );
			}
		});
	});
	
    let catBanner = {};
    if ( $(".archive_top_banner .swiper-slide").length > 1 ) {
        catBanner = {
            //direction: 'horizontal',
            loop: true,
            slidesPerView : 1,
            autoplayDisableOnInteraction: false,
			pagination: false,
			navigation: false,
            paginationClickable: true,
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			autoplay: true,
        }
    } else {
        catBanner = {
            loop: false,
            slidesPerView : 1,
            autoplay: false,
            watchOverflow: true,
            navigation: false,
        }
    }
    var catBannerVar = new Swiper('.archive_top_banner .swiper-container ', catBanner);	

	//Product image gallery - slick
	if ($('.product-summary-wrap .product-image-container .product-image-slide').length > 1) {
		$('.product-summary-wrap .product-image-wrapper').slick({
			rtl: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			pauseOnHover: true,
			speed: 500,
			autoplay: true,
			autoplaySpeed: 6000,
			arrows: true,
		});
	}

	if ($('figure.woocommerce-product-gallery__wrapper > div').length > 1) {
		$('figure.woocommerce-product-gallery__wrapper1').slick({
			rtl: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			pauseOnHover: true,
			speed: 500,
			autoplay: true,
			autoplaySpeed: 6000,
			arrows: true,
		});
	}


	//Product image gallery - Swiper
    let optionsPro = {};
    if ( $(".product-summary-wrap .swiper-container .swiper-slide").length > 1 ) {
        optionsPro = {
            //direction: 'horizontal',
            loop: true,
            slidesPerView : 1,
            autoplayDisableOnInteraction: false,
			pagination: {
				el: '.product-summary-wrap .swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.product-summary-wrap .swiper-button-next',
				prevEl: '.product-summary-wrap .swiper-button-prev',
			},
            paginationClickable: true,
            fadeEffect: {
	            crossFade: true
            },
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			//effect: 'fade',  
			breakpoints: {
				768: {
					slidesPerView : 1,
		        }
			}
			        
        }
        $('.product-summary-wrap .swiper-button-next').show();
        $('.product-summary-wrap .swiper-button-prev').show();
    } else {
        optionsPro = {
            loop: false,
            slidesPerView : 1,
            autoplay: false,
            watchOverflow: true,
            navigation: false,
        }
        $('.product-summary-wrap .swiper-button-next').hide();
        $('.product-summary-wrap .swiper-button-prev').hide();
        $('.product-summary-wrap .swiper-pagination').hide();
    }	
    var optionsProVar = new Swiper('.product-summary-wrap .swiper-container', optionsPro);	

	//Related Products slider
	if ($('.related_products_slider .related_product_item').length > 1) {
		$(".product_related_products_row").slick({
			rtl: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			pauseOnHover: true,
			speed: 500,
			autoplay: false,
			autoplaySpeed: 6000,
			arrows: true,
			responsive: [
		    {
		      breakpoint: 991,
		      settings: {
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		      }
		    }
			]
		});
	}

	//Project Gallery slider
	if ($('.project_gallery_wrapper .project_gallery_item').length > 1) {
		$('.project_gallery_wrapper').slick({
			rtl: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			pauseOnHover: true,
			speed: 500,
			//autoplay: true,
			autoplaySpeed: 6000,
			arrows: true,
			responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		      }
		    }
			]
		});
	}

	//Progect gallery slider
    let projGall = {};
    if ( $(".project_main_gallery .swiper-container .swiper-slide").length > 1 ) {
        projGall = {
            //direction: 'horizontal',
            loop: true,
            slidesPerView : 1,
            autoplayDisableOnInteraction: false,
			pagination: {
				el: '.project_main_gallery .swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.project_main_gallery .swiper-button-next',
				prevEl: '.project_main_gallery .swiper-button-prev',
			},
            paginationClickable: true,
            fadeEffect: {
	            crossFade: true
            },
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,			        
        }
        $('.project_main_gallery .swiper-button-next').show();
        $('.project_main_gallery .swiper-button-prev').show();
    } else {
        projGall = {
            loop: false,
            slidesPerView : 1,
            autoplay: false,
            watchOverflow: true,
            navigation: false,
        }
        $('.project_main_gallery .swiper-button-next').hide();
        $('.project_main_gallery .swiper-button-prev').hide();
        $('.project_main_gallery .swiper-pagination').hide();
    }	
    var projGallVar = new Swiper('.product-summary-wrap .swiper-container', projGall);	

	// Woocommerce Qty Field
	(function(theme, $) {

		theme = theme || {};

		$.extend(theme, {

			WooQtyField: {

				initialize: function() {

					this.build()
						.events();

					return this;
				},

				build: function() {
					var self = this;

					// Quantity buttons
					$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<button type="button" value="+" class="plus">+</button>' ).prepend( '<button type="button" value="-" class="minus">-</button>' );

					// Target quantity inputs on product pages
					$( 'input.qty:not(.product-quantity input.qty)' ).each( function() {
						var min = parseFloat( $( this ).attr( 'min' ) );

						if ( min && min > 0 && parseFloat( $( this ).val() ) < min ) {
							$( this ).val( min );
						}
					});

					$( 'input.qty:not(.product-quantity input.qty)' ).on('change', function(e) {
						if ($(this).closest('.quantity').next('.add_to_cart_button[data-quantity]').length) {
							var count = $(this).val();
							if (count) {
								$(this).closest('.quantity').next('.add_to_cart_button[data-quantity]').data('quantity', count);
							}
						}
					});

					$( document ).off('click', '.quantity .plus, .quantity .minus').on( 'click', '.quantity .plus, .quantity .minus', function() {

						// Get values
						var $qty        = $( this ).closest( '.quantity' ).find( '.qty' ),
							currentVal  = parseFloat( $qty.val() ),
							max         = parseFloat( $qty.attr( 'max' ) ),
							min         = parseFloat( $qty.attr( 'min' ) ),
							step        = $qty.attr( 'step' );

						// Format values
						if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
						if ( max === '' || max === 'NaN' ) max = '';
						if ( min === '' || min === 'NaN' ) min = 0;
						if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

						// Change the value
						if ( $( this ).is( '.plus' ) ) {

							if ( max && ( max == currentVal || currentVal > max ) ) {
								$qty.val( max );
							} else {
								$qty.val( currentVal + parseFloat( step ) );
							}

						} else {

							if ( min && ( min == currentVal || currentVal < min ) ) {
								$qty.val( min );
							} else if ( currentVal > 0 ) {
								$qty.val( currentVal - parseFloat( step ) );
							}

						}

						if ($(this).closest('.quantity').next('.add_to_cart_button[data-quantity]').length) {
							var count = $qty.val();
							if (count) {
								$(this).closest('.quantity').next('.add_to_cart_button[data-quantity]').data('quantity', count);
							}
						}

						// Trigger change event
						$qty.trigger( 'change' );
					});

					return self;
				},

				events: function() {
					var self = this;

					$(document).ajaxComplete(function(event, xhr, options) {
						self.build();
					});

					return self;
				}
			}

		});

	}).apply(this, [window.theme, jQuery]);

	   				
});