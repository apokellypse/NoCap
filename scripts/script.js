$(document).ready(function() {
	$('div.phpupload').hide();

	$('div.upload').click(function() {
		if ($('div.phpupload').css("display") == "inline-block") {
			// $('div.phpupload').hide(800); //ease in effect
			console.log('hidden');
		} else {
			$('div.phpupload').show(800);
			console.log('show');
		}
		
	});

});