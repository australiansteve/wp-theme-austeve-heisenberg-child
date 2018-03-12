function diagonalCssString(angle, colour1, colour2)
{
	return '-webkit-linear-gradient(' + angle + 'deg, '+colour1+' 50%, '+colour2+' 50%)';
}

function diagonalAngle()
{
	return Math.floor((Math.random() * 360) + 1) - 180;
}

jQuery( document ).ready(function() {
    jQuery(".post .post-block").each(function(){
	  var angle = diagonalAngle();
	  var css = diagonalCssString(angle, '#784b32', '#805b0c')
	  //console.log(css);
	  //jQuery(this).css('background', css)
	});

	jQuery(".austeve-events .post-block").each(function(){
	  var angle = diagonalAngle();
	  var css = diagonalCssString(angle, '#aad69c', '#50b848')
	  //console.log(css);
	  //jQuery(this).css('background', css)
	});

});



