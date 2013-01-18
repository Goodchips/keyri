$(document).ready(function(){
	$('#datatable').dataTable({
		"bJQueryUI": true,
		"bAutoWidth": false,
		"sDom": '<"H"fri>t<"F"fri>',
		"aoColumns": [
			{ "sWidth" : "0%","bVisible": false, "bSearchable": false },
			{ "sWidth" : "20%"},
			{ "sWidth" : "35%"},
			{ "bSortable": false, "bSearchable": false, "sWidth" : "15%" },
			{ "sWidth" : "10%"},
			{ "sWidth" : "0%","bSearchable": false },
			{ "sWidth" : "10%"},
			{ "sWidth" : "0%","bSearchable": false },
			{ "bSortable": false,"bSearchable": false, "sWidth" : "10%" }
		],
		"oLanguage": {
			"sInfo": " _END_/_TOTAL_ portails",
			"sInfoFiltered" : "",
			"sInfoEmpty": "Aucun portail",
			"sZeroRecords": "Aucun portail trouvé",
			"sSearch": "Filtre :"
		}
	});
	$( ".keys" ).tooltip({ content: "0" , items: "span", tooltipClass: "tooltip-table",track: true, open: function( event, ui ) {
		if($(this).next().html().length > 0) {$( ".keys" ).tooltip( "option", "content",$(this).next().html() ); }
	}});
	$( ".grades" ).tooltip({ content: "0" , items: "span", tooltipClass: "tooltip-table",track: true, open: function( event, ui ) {
		if($(this).next().html().length > 0) { $( ".grades" ).tooltip( "option", "content",$(this).next().html() ); }
	}});	
});