
jQuery(document).ready(function($) {
	setTimeout(refresh, 30000);
});

var refresh = function refreshIfUp() {
	if (jQuery){
		var url = window.location;
		var firstHeader = jQuery("h1")[0].innerHTML;

		var response = jQuery.ajax({
		    type: "GET",
		    url: url,
		    success: function(data) {
	            if (data.indexOf(firstHeader) >= 0) {
	            	location.reload(true);
	            }
	            else {
	            	console.log("First h1 doesn't match!");
	            	setTimeout(refresh, 30000);
	            }
	        },
	        error: function(e) {
	            console.log(e);
	            setTimeout(refresh, 30000);
	        }

		});
	}
};