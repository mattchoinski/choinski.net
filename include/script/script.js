function adjustContainerHeight()
{
	if ($("BODY").attr("height") !== undefined) 
	{
		$("BODY").remoteAttr("height");
	}
	if ($("HTML").attr("height") !== undefined)
	{
		$("HTML").removeAttr("height");
	}
	$("FOOTER").css( 
		{
			"position" : "relative",
			"width" : "100%"
		}
	);
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
