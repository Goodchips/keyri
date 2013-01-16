$(document).ready(function(){
	$('#datatable').dataTable({
		"bJQueryUI": true,
		"aoColumns": [
			{ "bVisible": false, "bSearchable": false },
			null,
			null,
			{ "bSortable": false, "bSearchable": false },
			null,
			{ "bVisible": true, "bSearchable": false },
			null,
			{ "bVisible": true, "bSearchable": false },
			{ "bSortable": false,"bSearchable": false }
		]
	});
	$( ".keys" ).tooltip({ content: "0" , items: "span", tooltipClass: "tooltip-logo",track: true, open: function( event, ui ) {
		if($(this).next().html().length > 0) {$( ".keys" ).tooltip( "option", "content",$(this).next().html() ); }
	}});
	$( ".grades" ).tooltip({ content: "0" , items: "span", tooltipClass: "tooltip-logo",track: true, open: function( event, ui ) {
		if($(this).next().html().length > 0) { $( ".grades" ).tooltip( "option", "content",$(this).next().html() ); }
	}});	
});