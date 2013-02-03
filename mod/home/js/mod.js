var oTable ;
$(document).ready(function(){
	oTable = $('#datatable').dataTable({
		"bJQueryUI": true,
		"bAutoWidth": true,
		"sDom": '<"H"fri>t<"F"fri>',
		"aoColumns": [
			{ "sWidth" : "0%", "bSearchable": false, "sClass": "hidden" },
			{ "sWidth" : "20%"},
			{ "sWidth" : "35%"},
			{ "bSortable": false, "bSearchable": false, "sWidth" : "15%" },
			{ "sWidth" : "10%"},
			{ "sWidth" : "0%","bSearchable": false, "sClass": "hidden" },
			{ "sWidth" : "10%"},
			{ "sWidth" : "0%","bSearchable": false, "sClass": "hidden" },
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
	$('.button-keys').bind('click',function(){
		$(this).hide();
		$(this).next().css('display','block').focus(function(){ $(this).select(); }).focus();
	});
	//			TOUCHES PERMISES : 0123456789 del et backspace	
	$('.text-keys').bind('keydown',function(e){
		var key = e.which || e.keyCode;

	     if ( !e.altKey && !e.ctrlKey && e.shiftKey &&
	     // numbers   
	         key >= 48 && key <= 57 ||
	     // Numeric keypad
	         key >= 96 && key <= 105 ||
	     // Backspace and Tab and Enter and Del
	        key == 8 || key == 9 || key == 13 || key == 46 ||
	     // left and right arrows
	        key == 37 || key == 39)
	         return true;
	
	     return false;
	});
	$('.text-keys').bind('focusout',function(){
		var b = $(this).prev();
		var v = $(this).val() ? $(this).val() : b.val();
		var id_portal = $(this).parents('tr.row').children('td:first').html();

		if(v == b.val()){
			$(this).val(v).hide();
			b.val(v).show();			
		}
		else{
			$(this).hide();
			$(this).parent().parent().find('.button-keys-minus,.button-keys-plus').hide();
			$.ajax({
				type: "POST",
				url: rootUrl,
				data: { t: "editKeys", id_portal: id_portal, keys:  v}
			}).done(function( msg ) {
				if(msg == "1"){
					b.val(v);					
				}
			}).always(function(){
				b.show();
				$(document).find('.button-keys-minus,.button-keys-plus').show();				
			});
		}
	});
	$('.button-keys-minus').bind('click',function(){
		var b = $(this).parent().parent().find('.button-keys');
		b.val( parseInt(b.val()) - 1);
	});
	$('.button-keys-plus').bind('click',function(){
		var b = $(this).parent().parent().find('.button-keys');
		b.val( parseInt(b.val()) + 1);
	});
});