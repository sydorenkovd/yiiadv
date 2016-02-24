/**
 * Created by Виктор Сидоренко on 25.02.2016.
 */
/**
 * get the click of the create button
 */
$(function(){
    $('#modalButton').click(function(){
        $('#modal').modal('show').find('#modalContent')
            .load($(this).attr('value'));
    });
    });
