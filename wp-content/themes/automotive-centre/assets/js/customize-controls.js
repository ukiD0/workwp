( function( api ) {

	// Extends our custom "automotive-centre" section.
	api.sectionConstructor['automotive-centre'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

jQuery( document ).ready(function($) {
	var this_obj = automotive_centre_customizer_params;
  	var api = wp.customize;

	// Reset options
	$('.refresh-btn').on('click', function() {
		var dataValue = $(this).attr('data-value');
		$.get( automotive_centre_customizer_params.ajaxurl + '?action=' + dataValue, function( data ) {
	  		window.location.reload();
		});
	});

	$('.reset-button').on('click', function() {
		var $this = $(this);
		$this.closest('.customize-control').find('.kt-modal').show();
	});

	$('.close').on('click', function() {
		$(this).closest('.kt-modal').hide();
	});

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if ($(event.target).hasClass('kt-modal')) {
		  $('.kt-modal').hide();
		}
	}
});