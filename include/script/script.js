function adjustContainerHeight()
{
	if ( $( window ).height() > $( 'BODY' ).height() )
	{
		$( 'BODY' ).css( 'height', '100%' );
		$( 'HTML' ).css( 'height', '100%' );
		$( 'FOOTER' ).css( 
			{
				'bottom' : '0',
				'position' : 'absolute'
			}
		);
	}
}

adjustContainerHeight();
