function adjustContainerHeight()
{
	$("BODY").css("height", "auto");
	$("HTML").css("height", "auto");
	if ( $("FOOTER").attr("bottom") !== undefined)
	{
		$("FOOTER").removeAttr("bottom");
	}
	$("FOOTER").css( "position", "relative");
	if ($(window).height() > $("BODY").height())
	{
		$("BODY").css("height", "100%");
		$("HTML").css("height", "100%");
		$("FOOTER").css( 
			{
				"bottom" : "0",
				"position" : "absolute"
			}
		);
	}
}

jQuery(
	function()
	{
		setTimeout(function(){window.scrollTo(0,0);}, 0);
		$("BODY").on(
			"resize",
			function()
			{
				adjustContainerHeight();
			}
		);
		adjustContainerHeight();
	}
);
