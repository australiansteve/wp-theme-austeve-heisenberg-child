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

	//trigger the first FAQ category being displayed when page initially loads
	$("a.change-faqs:nth-of-type(1)").trigger("click");


	$(".bod-image").on('click', function(e){
		//console.log("bio click");
		var img = $(this).find('img');
		var bio = $(this).find('.bod-bio').html();
		//console.log("bio:" + bio);
		var marginLeft = (img.width()/2) - 30;
		//console.log("marginLeft:" + marginLeft);

		$(".bio-display:visible").each(function(){
			$(this).html("");
		});


		$(".active-arrow.active").each(function(){
			//console.log("Removing active from active-arrow");
			$(this).removeClass("active");
		});

		$(this).find('.active-arrow').each(function(){
			//console.log("Adding active to active-arrow");
			$(this).addClass('active');
			$(this).css('margin-left', marginLeft+'px');
		});

		$(this).nextAll(".bio-display:visible").first().html(bio);		
		
	});

	$(".reason-image").on('click', function(e){
		//console.log("reason click");
		var img = $(this).find('img');
		var bio = $(this).find('.reason-bio').html();
		//console.log("reason:" + bio);
		var marginLeft = (img.width()/2) - 30;
		//console.log("marginLeft:" + marginLeft);

		$(".reason-display:visible").each(function(){
			$(this).html("");
		});


		$(".active-arrow.active").each(function(){
			//console.log("Removing active from active-arrow");
			$(this).removeClass("active");
		});

		$(this).find('.active-arrow').each(function(){
			//console.log("Adding active to active-arrow");
			$(this).addClass('active');
			$(this).css('margin-left', marginLeft+'px');
		});

		$(this).nextAll(".reason-display:visible").first().html(bio);		
		
	});

});