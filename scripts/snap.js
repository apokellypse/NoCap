$(document).ready(function() {
	var lastScrollTop = 0;
	var windowNum = 0;
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
 //stackoverflow solution: http://stackoverflow.com/questions/8189840/get-mouse-wheel-events-in-jquery
	$(window).bind('mousewheel DOMMouseScroll', function(event){
    	if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
        	console.log("up");
        	scrollLeft();
        	windowCount();
    	}
    	else {
        	console.log("down");
        	scrollRight();
        	windowCount();
    	}
	});

	function scrollRight() {
		$("html, body").animate({ scrollLeft: "+=" + getWidth()});
	}

	function scrollLeft() {
		$("html, body").animate({ scrollLeft: "-=" + getWidth()});
	}

	function getHeight() {
		return $(window).height();
	}

	function getWidth() {
		return $(window).width()
	}

	function windowCount() {
		windowNum = $(window).scrollLeft()/getWidth();
		console.log(windowNum);
	}

	$(window).resize(function() {
		console.log('window resized');
		var whereIam = $(window).scrollLeft(); //how far left currently scrolled
		//add 200 to adjust way it rounds
		//we want to snap to the current window
		var wheretogo = Math.round(whereIam/getWidth());
		console.log(wheretogo);
		var finaldest = getWidth() * wheretogo;
		console.log(finaldest);

		//disregard the above, found another method lolz
		var finaldest2 = (windowNum)*getWidth();
		$("html, body").scrollLeft( finaldest2.toString() );
	});

});