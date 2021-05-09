$(document).ready(function () {
    DemoModule.Init();
    DemoModule.InitEvents();
});
var CommonModule = (function () {

    var Validate = function() {
       try {
            var error = 0;
            $('.required').each(function(){
                var $input = $(this);
                var val = $input.val();
                if(val === '') {
                    $input.addClass('error');
                    error++;
                    if( $(this).attr('id') == 'TXT_user_cd'){
                        $(this).parent().next().html('入力してください');
                    }else{
                        $(this).next().html('入力してください');
                    }
                }
                else {
                    $input.removeClass('error');
                    $(this).next().html('');
                }

            });
            // validator min
            $('[min]').each(function(){
            let valueMin = $(this).val();
            if( valueMin.length < $(this).attr('min')){
                error++;
                $(this).next().html('6入力してください');
            }
            })
            //End validator min
          
            if (error > 0) {
                return false;
            }
            return true;
        }
        catch (e) {
            console.log('Submit: ' + e.message);
        }
    };


    return {
        Validate: Validate
    };
})();



// singleton
var DemoModule = (function () {
    var Init = function () {
        try {
        }
        catch (e) {
            console.log('Init: ' + e.message);
        }
    };

    var InitEvents = function () {
        
        try {
            $('.number-only').on('keyup', function (e) {
                OnlyInputNumber(e, $(this));
            });
            $('#BTN_Search').on('click', function(){
                Submit();
            });
            $('#BTN_Save').on('click', function(e){
                CommonModule.Validate();
                if( !CommonModule.Validate()){
                    e.preventDefault();
                }
            });

            // validator min-max
            
            $('[max]').on('keyup', function (e) {
                
                let max = $(this).attr('max'); 
                if($(this).val().length > max ){
                    
                    let value_max = $(this).val().slice(0, -($(this).val().length - max));
                    $(this).val(value_max);

                    $(this).next().html('Tối đa ' + max +' kí tự')

                    setTimeout( () => $(this).next().html(''), 3000);
                }

                
            });

            $('[min]').on('keyup', function (e) {
                let min = $(this).attr('min'); 
                let max = $(this).attr('max');

                if(!max){
                    
                        max = min + 1;
                }
                if($(this).val().length < min ){
                    $(this).next().html('Tối thiểu' + min +' kí tự');
                }
                if ( $(this).val().length >= min &&  $(this).val().length < max ){
                    $(this).next().html('');
                }

                return false;
            });
            // End validator min-ma


        }


        catch (e) {
            console.log('InitEventLogin:' );
        }
    }

    var OnlyInputNumber = function (e, $input) {
        try {
            $input.val($input.val().replace(/[^0-9]/g, ""));
            if ((e.which < 48 || e.which > 57)) {
                e.preventDefault();
            }
        }

        catch (e) {
            console.log('OnlyInputNumber: ' + e.message);
        }
    };
    

    
    var Submit = function() {
        CommonModule.Validate();
        try {
            if (CommonModule.Validate()){

                var user_cd  = $('#TXT_user_cd').val();
                var user_j  = $('#TXT_user_nm_j').val();
                var user_e = $('#TXT_user_nm_e').val();

                // AJAX 
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                   });
                            
                   $.ajax({
                    method: "POST",
                    url: '/search', 
                    data: {
                        user_cd: user_cd,
                        user_nm_j: user_j,
                        user_nm_e: user_e,
                                    
                    },
                    success : function(response){
                    
                        var result = JSON.parse(JSON.stringify(response));
                        $('#result_table').find("tbody tr").remove();
                        $.each( result, function( key, value ) 
                            
                        {
                            // let user_cd = Number(value['user_cd']);
                            
                            $('#result_table').append(

                                "<tr><td> <a href='detail/" +  value['user_cd'] + "'> " + value['user_cd'] + "</a></td><td>" 

                                + value['user_nm_j'] + "</td><td>" 

                                + value['user_ab_j'] + "</td><td>"

                                + value['user_nm_e'] + "</td><td>"

                                + value['user_ab_e'] + "</td><td>"

                                + value['lib_val_nm_j'] + "</td><td>"

                                + value['lib_val_nm_js'] + 

                                "</td></tr>");
                        });
                        
                    }
                });

            }
            else {
                $('.error').first().focus();
            }
        }
        catch (e) {
            console.log('Submit: ' + e.message);
        }
    };

    var save = function(){
        CommonModule.Validate();
        if(CommonModule.Validate()){
            
        }
    };
    
    return {
        Init: Init,
        InitEvents: InitEvents
    };
})();


