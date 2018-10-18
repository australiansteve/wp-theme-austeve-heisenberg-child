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
	setTimeout(adjustBottomOfCtaBlocks(), 500);
});

jQuery(document).ready(function($) {
	setTimeout(adjustHeightOfFlexImages(), 500);
	setTimeout(adjustBottomOfCtaBlocks(), 1500);
});

function adjustHeightOfFlexImages() {
	var flexElements = document.getElementsByClassName('flex-image');

	Array.from(flexElements).forEach(function(element) {
		var ratio = element.getAttribute('data-flex-ratio');
		element.style.height = (element.offsetWidth * ratio) + "px";
	});
}

function adjustBottomOfCtaBlocks() {
	var ctaButtonsToReposition = document.querySelectorAll(".home.page .call-to-action-section .content");

	Array.from(ctaButtonsToReposition).forEach(function(element) {
		var parentHeight = element.parentElement.offsetHeight;

		element.style.bottom = "calc(("+parentHeight+"px - 100px) / 2)";
	});
}