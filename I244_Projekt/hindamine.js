$(document).ready(function() {
	$('img').hover(makeBigger, returnToOriginalSize);

	function makeBigger() {
		$(this).css({height: '+=10%', width: '+=10%'});
	}
	function returnToOriginalSize() {
		$(this).css({height: "", width: ""});
	}
 });
