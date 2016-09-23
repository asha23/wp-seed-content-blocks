// Base Javascript

// Suppress Lint semicolon warnings
/* jshint asi: true */

jQuery(document).ready(function($) {

    // Gallery lightgallery-all

    $("#image-gallery").lightGallery();

    // Video lightgallery-all

    $("#video-gallery").lightGallery({
        thumbnail: false,
        videoMaxWidth: '90%',
        subHtml: '',
        fullScreen: false,
        youtubePlayerParams: {
            rel: 0
        }
    });

    // Share modal links
    $('.share-modal').click(function(ev) {

    	if($(window).width() > 600) {
		    ev.preventDefault();
	        window.open($(this).attr('href'), '', 'width=600,height=350');
	    } else {
	    	window.open($(this).attr('href'));
	    }

	});

	// Nav hamburgler toggler

	$('.navbar-toggle').click(function() {
		$(this).children('div').toggleClass('active');
		$(this).toggleClass('active');
	});

	// Match height on elements

	$('.match').matchHeight({
		byRow : true,
		property : 'height'
	});

	// Accordion

	function doOffset(self) {
		theOffset = $(self).offset();
		$('body, html').animate({ scrollTop: theOffset.top}, 300);
	}

	$(".set > a").on("click", function(){

		var self = $(this);

		if($(this).hasClass('active')){
			$(this).removeClass("active");
			$(this).siblings('.content').slideUp(200);
			$(".set > a i").removeClass("fa-minus").addClass("fa-plus");
		} else {
			$(".set > a").removeClass("active");
			$(this).addClass("active");
			$('.content').slideUp(200);
			$(this).siblings('.content').slideDown(200, function(){
				doOffset(self); // Do this once the box has opened
			});
		}
	});

	// Top level dropdaown clickable

	function toggleDropdown(dropdown, delay, fade, state) {
	    if (state === undefined) visible = !visible
	    else visible = state

	    dropdown.children('.dropdown-menu').stop(true, true).delay(delay)[visible ? 'fadeIn' : 'fadeOut'](fade, function() {
	        dropdown.toggleClass('open', visible);
	        dropdown.children('.dropdown-toggle').attr('aria-expanded', visible);
	        $(this).css('display', '');
	    });
	}

	$('ul.nav li.dropdown').hover(function() {
		if (!$('.navbar-toggle').is(':visible')) {
			$(this).toggleClass('open', true);
		}
		}, function() {
		if (!$('.navbar-toggle').is(':visible')) {
			$(this).toggleClass('open', false);
		}
	});

	$('ul.nav li.dropdown a').click(function(){
		if (!$('.navbar-toggle').is(':visible') && $(this).attr('href') != '#') {
			$(this).toggleClass('open', false);
			window.location = $(this).attr('href')
		}
		//window.location = $(this).attr('href')
	});

});
