jQuery(document).on('opened.zf.offcanvas', function($) {
	var off_canvas_icon = jQuery(this).find('i');

    off_canvas_icon.removeClass('fa-bars').addClass('fa-times');
});

jQuery(document).on('closed.zf.offcanvas', function() {
    var off_canvas_icon = jQuery(this).find('i');

    off_canvas_icon.removeClass('fa-times').addClass('fa-bars');
});


jQuery(document).ready(function($) {

	$("a.change-faqs").on('click', function(e){
		e.preventDefault();

		var category = $(this).attr('data-name');
		var slug = $(this).attr('data-slug');

		//var courseContent = document.getElementsByName(course)[0].innerHTML;
		//$("#menu-container").html(courseContent);

		//add hidden class from all menu-links
		$("#faqs .question, #faqs .answer").each(function() {
			if ($(this).hasClass(slug))
			{
				$(this).removeClass('hidden');
			}
			else
			{
				$(this).addClass('hidden');
			}
		});

		//change the header
		$("span.category-name").html(category);
	});

	$("a.change-faqs:nth-of-type(1)").trigger("click");
});