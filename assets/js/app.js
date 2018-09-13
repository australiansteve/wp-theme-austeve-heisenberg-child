jQuery(document).ready(function($) {

	$(".menu-link a").on('click', function(e){
		e.preventDefault();

		var course = $(this).attr('data-name');
		//console.log("Link clicked: " + course);

		var courseContent = document.getElementsByName(course)[0].innerHTML;
		$("#menu-container").html(courseContent);

		//remove active class from all menu-links
		$(".menu-link a").each(function() {
			$(this).removeClass('active');
		})
		$(this).addClass('active');
	});


	$(".dropdown.menu a, a.button").on('click', function(e){

		console.log("A link or button was clicked. " + $(this).attr('href'));

		if ($(this).attr('href').indexOf('http') != 0)
		{
			console.log("It's an internal link");
			e.preventDefault();

			var destId = $(this).attr('href').substr(1);

			if (destId == "deli")
			{
				//the deli menu item is actually a link to the menu, with the deli page selected. So trigger that click and then keep moving
				$(".menu-link a[data-name='menu-deli']").trigger('click');
				destId = "menu";
			}

			var element = document.getElementById(destId);
			element.scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
		}

	});

	$(".menu-link a[data-name='menu-breakfast']").trigger('click');

});
