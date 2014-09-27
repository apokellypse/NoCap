$(document).ready(function() {
	var lastScrollTop = 0;
	$(window).scroll(function(event) {
		var st = $(this).scrollTop();
		if (st > lastScrollTop) {
			console.log("you scrolled down");
			// scrollRight();
		} 
		if (st < lastScrollTop) {
			console.log("you scrolled up");
			// scrollLeft();
		}
		lastScrollTop = st;

		return false;
	});

	$(window).bind('mousewheel DOMMouseScroll', function(event){
    	if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
        	console.log("up");
        	scrollLeft();
    	}
    	else {
        	console.log("down");
        	scrollRight();
    	}
	});

	function scrollRight() {
		$("html, body").animate({ scrollLeft: "+=1800px"});
	}

	function scrollLeft() {
		$("html, body").animate({ scrollLeft: "-=1800px"});
	}

});