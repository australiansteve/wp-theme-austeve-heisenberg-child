jQuery(document).on('opened.zf.offcanvas', function($) {
	var off_canvas_icon = jQuery(this).find('i');

    off_canvas_icon.removeClass('fa-bars').addClass('fa-times');
});

jQuery(document).on('closed.zf.offcanvas', function() {
    var off_canvas_icon = jQuery(this).find('i');

    off_canvas_icon.removeClass('fa-times').addClass('fa-bars');
});

window.addEventListener("resize", function(e) {
	adjustHeightOfFlexImages();
});

jQuery(document).ready(function($) {
	setTimeout(adjustHeightOfFlexImages(), 500);
});

function adjustHeightOfFlexImages() {
	var flexElements = document.getElementsByClassName('flex-image');

	Array.from(flexElements).forEach(function(element) {
		var ratio = element.getAttribute('data-flex-ratio');
		element.style.height = (element.offsetWidth * ratio) + "px";
	});
}