jQuery( document ).ready(function( $ ){

	$(".menu-item-has-children").click(function(){
		if ( $("ul", this).is(":hidden") ) {
			$("ul", this).fadeIn("fast", function(){});
		} else {
			$("ul", this).fadeOut("fast", function(){});
		}
	});

});