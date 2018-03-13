function diagonalCssString(angle, colour1, colour2)
{
	return '-webkit-linear-gradient(' + angle + 'deg, '+colour1+' 50%, '+colour2+' 50%)';
}

function diagonalAngle()
{
	return Math.floor((Math.random() * 360) + 1) - 180;
}

// extension:
jQuery.fn.scrollEnd = function(callback, timeout) {          
  jQuery(this).scroll(function(){
    var $this = jQuery(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};

//Resize logo after scrolling down the page - resizing after moving back to the top of the page is a bit wonky and causes things to jump aroud, so I'm not doing that here
jQuery(window).scrollEnd(function(){
    if (jQuery(this).scrollTop() > 0)
    {
    	//transition logo smaller
    	jQuery("header .custom-logo-link img").each(function() {
			jQuery(this).css("max-width", "100px");
			jQuery(this).css("-webkit-transition", "max-width .5s ease");
			jQuery(this).css("transition", "max-width .5s ease");
		});
    	
    }
}, 1000);

jQuery( document ).ready(function() {

});




