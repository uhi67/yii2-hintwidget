console.log('hintwidget');

$(function(){
	$('.hint-content').each(function() {
		$(this).dialog({
			autoOpen: false,
			resizable: false,
			height: "auto",
			width: $(this).data('width'),
			modal: false
		});
	});
	$('.hint-hint').on('click', function() {
		var id = $(this).data('id');
		//console.log('hint', id, $('#'+id).get(0));
		$('#'+id).dialog('open');
	});

	$('.hint-container').each(function() {
		$(this).css('display', 'table-cell');
		var $hint_block = $('.hint-block', this);
		var id = $hint_block.attr('id');
		if(!id) {
			id = '_' + Math.random().toString(36).substr(2, 9);
			$hint_block.attr('id', id);
		}
		$('.hint-hint', this).data('id', id);
		$('.hint-block', this).hide().each(function() {
			var fieldName = $(this).closest('.form-group').find('label').html();
			if(fieldName) fieldName += ' - ';
			$(this).attr('title', fieldName + 'Súgó');
			$(this).dialog({
				autoOpen: false,
				resizable: false,
				height: "auto",
				width: $(this).data('width'),
				modal: false
			});
		});
	});
});
