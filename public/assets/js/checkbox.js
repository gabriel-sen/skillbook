$('input:checkbox').change(function(){
    if($(this).is(':checked'))
        $(this).parent().addClass('selected');
    else
        $(this).parent().removeClass('selected')
});