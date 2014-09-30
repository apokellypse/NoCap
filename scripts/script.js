$(document).ready(function() {
	$('div.phpupload').hide();

	$('#upload').click(function() {
		if ($('div.upload').css("height") == "60px") {
			$('div.upload').css("height", "145px");
			$('div.upload').css("width", "250px");
			// $('div.phpupload').hide(800); //ease in effect
			console.log('hidden, will show now');
		} else {
			// $('div.phpupload').show(800);
			$('div.upload').css("height", "60px");
			$('div.upload').css("width", "90px");
			console.log('shown, will hide now');
		}
		
	});

	// $('input[type=submit]').click(function() {
	// 	console.log('submitting');
	// 	$('div.phpnotice').hide().delay(3000).fadeOut();
	// 	$('div.phpsuccess').hide().delay(3000).fadeOut();
	// });

	window.setInterval(function() {
		if ($('div.phpnotice').css("display") == "inline-block") {
			$('div.phpnotice').hide().delay(3000).fadeOut();
			console.log('detected a warning, we hide it after a while');
		}
		if ($('div.phpsuccess').css("display") == "inline-block") {
			$('div.phpsuccess').hide().delay(3000).fadeOut();
		}
	}, 1000);

});