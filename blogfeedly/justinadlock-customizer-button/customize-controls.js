( function( api ) {

	// Extends our custom "blogfeedly" section.
	api.sectionConstructor['blogfeedly'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
