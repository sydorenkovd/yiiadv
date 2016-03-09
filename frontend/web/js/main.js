/**
 * Created by Виктор Сидоренко on 09.03.2016.
 */
$(function(){
    $(document).on('click', '.fc-day', function(){
        var date = $(this).attr('data-date');
        $.get('event/create', {'date':date}, function(data){
            $('#modal').modal('show').find('#modalContent').html(data);
        }) ;
    });
    $('#modalButton').click(function(){
        $('#modal').modal('show').find('#modalContent')
            .load($(this).attr('value'));
    });
});
