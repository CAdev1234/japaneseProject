jQuery(document).ready(function(){
//search menu
	jQuery("#headersearch").click(function () {
		jQuery("#headsearcharea").show("fast");
		jQuery('#headsearcharea iframe').contents().find('input:visible').first().focus();
	});

  jQuery('#headsearcharea, #headersearch, .fs-turn-page-link').on('click', function(e) {
    e.stopPropagation();
  });
  jQuery(document).on('click', function() {
    jQuery('#headsearcharea').hide("fast");
  });

});

