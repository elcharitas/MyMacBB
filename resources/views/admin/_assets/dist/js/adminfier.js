(function($) {
  "use strict";
  
	  // Configure tooltips for collapsed side navigation
	  $('.side-navbar [data-toggle="tooltip"]').tooltip({
		template: '<div class="tooltip side-navbar-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
	  })
	  // Toggle the side navigation
	  $("#sidenavToggler").click(function(e) {
		e.preventDefault();
		$("body").toggleClass("sidenav-toggled");
		$(".side-navbar .nav-link-collapse").addClass("collapsed");
		$(".side-navbar .sidenav-second-level, .side-navbar .sidenav-third-level").removeClass("show");
	  });
	  // Force the toggled class to be removed when a collapsible nav link is clicked
	  $(".side-navbar .nav-link-collapse").click(function(e) {
		e.preventDefault();
		$("body").removeClass("sidenav-toggled");
	  });
	  
     // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
	  $('body.fixed-nav .side-navbar, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
		var e0 = e.originalEvent,
		  delta = e0.wheelDelta || -e0.detail;
		this.scrollTop += (delta < 0 ? 1 : -1) * 30;
		e.preventDefault();
	  });
  
	  // Scroll to top button appear
	  $(document).scroll(function() {
		var scrollDistance = $(this).scrollTop();
		if (scrollDistance > 100) {
		  $('.scroll-to-top').fadeIn();
		} else {
		  $('.scroll-to-top').fadeOut();
		}
	  });
	 
	  
	  // Smooth scrolling using jQuery easing
	  $(document).on('click', 'a.scroll-to-top', function(event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
		  scrollTop: ($($anchor.attr('href')).offset().top)
		}, 1000, 'easeInOutExpo');
		event.preventDefault();
	  });
	  
	  // Slim Scroll message & notification
	  $('#message-box').slimScroll({
		color: '#f2f7fb',
		size: '5px',
		height: '250px',
		alwaysVisible: true
	  });
	  
	  $('#notification-box').slimScroll({
		color: '#f2f7fb',
		size: '5px',
		height: '250px',
		alwaysVisible: true
	  });
	  
	   $('.rightMenu-scroll').slimScroll({
			height: '650px',
			color: '#f4f5f7'
		});
	  
	  
	  // Twitter Slick Slider
	  $('.social-card-slide').slick({
	  dots:false,
	  speed:600,
	  autoplay: true,
	  slidesToShow: 1,
	  arrows: false, 
	});
	
	$('#styleOptions').styleSwitcher();
    $('.dropdown-toggle').dropdown()
})(jQuery); // End of use strict
