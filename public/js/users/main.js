$(document).ready(function (){
    $('#condition_toggle').click(function(){
        $('#condition_input').toggle(500);
        $('#work_input').toggle(500);
        $('hr').toggle(500);
    });


    let tr = $('.table tbody tr');
    let tdColor = function(){
        for(i = 0; i < tr.length; i++){
            if(i % 2 == 1){
                tr.siblings().eq(i).children().addClass('table-color');
            }
        }
    }
    tdColor();

})
