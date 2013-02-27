var oTable ;
$(document).ready(function(){
	oTable = $('#datatable').dataTable({
		"bJQueryUI": true,
		"bAutoWidth": true,
		"sDom": '<"H"fri>t<"F"fri>',
		"bProcessing": true,
/*
        "sAjaxSource": ajaxDatatableUrl,
        "bDeferRender": true,
*/
        "bStateSave": true,
		"aoColumns": [
			{ "sWidth" : "0%", "bSearchable": false, "sClass": "hidden" },
			{ "sWidth" : "20%"},
			{ "sWidth" : "35%"},
			{ "bSortable": false, "bSearchable": false, "sWidth" : "15%" },
			{ "sWidth" : "10%", "sClass": "keys"},
			{ "sWidth" : "0%","bSearchable": false, "sClass": "hidden" },
			{ "sWidth" : "10%", "sClass": "grades"},
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
	$('.button-keys, .button-grade').bind('click',function(){
		$(this).hide();
		$(this).next().val($(this).val()).css('display','block').focus(function(){ $(this).select(); }).focus();
	});
	//			TOUCHES PERMISES : 0123456789 del et backspace	
	$('.text-keys, .text-grade').bind('keydown',function(e){
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
		var grade = $(this).parents('tr.row').find('.text-grade').val();

		if(v == b.val()){
			$(this).val(v).hide();
			b.val(v).show();			
		}
		else{
			$(this).hide();
			$(this).parent().parent().find('.button-keys-minus,.button-keys-plus').hide();
			$.ajax({
				type: "POST",
				url: ajaxUrl,
				data: { t: "editKeys", id_portal: id_portal, keys:  v, grade : grade}
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
		var v = parseInt(b.val()) - 1;
		var id_portal = $(this).parents('tr.row').children('td:first').html();
		var grade = $(this).parents('tr.row').find('.text-grade').val();

		$(this).parent().parent().find('.button-keys-minus,.button-keys-plus,.button-keys').hide();
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: { t: "editKeys", id_portal: id_portal, keys:  v, grade : grade}
		}).done(function( msg ) {
			if(msg == "1"){
				b.val(v);
			}
		}).always(function(){
			b.show();
			$(document).find('.button-keys-minus,.button-keys-plus').show();				
		});	
	});
	$('.button-keys-plus').bind('click',function(){
		var b = $(this).parent().parent().find('.button-keys');
		var v = parseInt(b.val()) + 1;
		var id_portal = $(this).parents('tr.row').children('td:first').html();
		var grade = $(this).parents('tr.row').find('.text-grade').val();

		$(this).parent().parent().find('.button-keys-minus,.button-keys-plus,.button-keys').hide();
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: { t: "editKeys", id_portal: id_portal, keys:  v, grade : grade}
		}).done(function( msg ) {
			if(msg == "1"){
				b.val(v);
			}
		}).always(function(){
			b.show();
			$(document).find('.button-keys-minus,.button-keys-plus').show();				
		});	
	});
	$('.text-grade').bind('focusout',function(){
		var b = $(this).prev();
		var v = $(this).val() ? $(this).val() : b.val();
		var id_portal = $(this).parents('tr.row').children('td:first').html();
		var keys = $(this).parents('tr.row').find('.text-keys').val();

		if(v == b.val()){
			$(this).val(v).hide();
			b.val(v).show();			
		}
		else{
			$(this).hide();
			$(this).parent().parent().find('.button-grade-minus,.button-grade-plus').hide();
			$.ajax({
				type: "POST",
				url: ajaxUrl,
				data: { t: "editGrade", id_portal: id_portal, grade:  v, keys: keys}
			}).done(function( msg ) {
				if(msg == "1"){
					b.val(v);					
				}
			}).always(function(){
				b.show();
				$(document).find('.button-grade-minus,.button-grade-plus').show();				
			});
		}
	});
	$('.button-grade-minus').bind('click',function(){
		var b = $(this).parent().parent().find('.button-grade');
		var v = parseInt(b.val()) - 1;
		var id_portal = $(this).parents('tr.row').children('td:first').html();
		var keys = $(this).parents('tr.row').find('.text-keys').val();

		$(this).parent().parent().find('.button-grade-minus,.button-grade-plus,.button-grade').hide();
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: { t: "editGrade", id_portal: id_portal, grade:  v, keys: keys}
		}).done(function( msg ) {
			if(msg == "1"){
				b.val(v);
			}
		}).always(function(){
			b.show();
			$(document).find('.button-grade-minus,.button-grade-plus').show();				
		});	
	});
	$('.button-grade-plus').bind('click',function(){
		var b = $(this).parent().parent().find('.button-grade');
		var v = parseInt(b.val()) + 1;
		var id_portal = $(this).parents('tr.row').children('td:first').html();
		var keys = $(this).parents('tr.row').find('.text-keys').val();

		$(this).parent().parent().find('.button-grade-minus,.button-grade-plus,.button-grade').hide();
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: { t: "editGrade", id_portal: id_portal, grade:  v, keys: keys}
		}).done(function( msg ) {
			if(msg == "1"){
				b.val(v);
			}
		}).always(function(){
			b.show();
			$(document).find('.button-grade-minus,.button-grade-plus').show();				
		});	
	});	
});