
 $('#insert_search').on('click', function(){

    let user_cd = $('#TXT_user_cd').val();

    if(!user_cd){
        $('#TXT_user_cd').parent().next().html('入力してください');
    }else{

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
           
    $.ajax({
        method: "POST",
        url: 'insert/search', 
        data: {
            user_cd: user_cd,
        },
        success : function(response){
            var result = JSON.parse(JSON.stringify(response));
            
            if(result.length > 0){

                $.each(result, function(key, value){
                    $('#TXT_user_cd').parent().next().html('');

                    $('#TXT_user_nm_j').attr('value', value['user_nm_j']);
                    $('#TXT_user_ab_j').attr('value', value['user_ab_j']);
                    $('#TXT_user_nm_e').attr('value', value['user_nm_e']);
                    $('#TXT_user_ab_e').attr('value', value['user_ab_e']);
                    $('#TXT_pwd').attr('value', value['pwd']);
                    $('#TXT_pwd_upd_datetime').attr('value', value['pwd_upd_datetime']);
                    $('#TXT_login_datetime').attr('value', value['login_datetime']);
                    $('#TXT_memo').attr('value', value['memo']);
                    $('#TXA_memo').val(value['memo']);
                    $('#BTN_Delete').attr('href', 'detail/remove/' +  value['user_cd'] );
                });
            }else{
                $('#TXT_user_cd').parent().next().html('IDが見つかりませんでした');

                $('#TXT_user_nm_j').val('');
                $('#TXT_user_ab_j').val('');
                $('#TXT_user_nm_e').val('');
                $('#TXT_user_ab_e').val('');
                $('#TXT_pwd').val('');
            }
          

        }
    });



    }


});

// update

$('#BTN_Save').on('click', function(e){
    CommonModule.Validate();
    if( !CommonModule.Validate()){
        e.preventDefault();
    }else{

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            method: 'POST',
            url: 'update', 
            data: {
                user_cd : $('#TXT_user_cd').val(),
                user_nm_j : $('#TXT_user_nm_j').val(),
                user_ab_j : $('#TXT_user_ab_j').val(),
                user_nm_e : $('#TXT_user_nm_e').val(),
                user_ab_e : $('#TXT_user_ab_e').val(),
                pwd : $('#TXT_pwd').val(),
                belong_div : $('#CMB_belong_div').val(),
                position_div : $('#CMB_position_div').val(),
                auth_role_div : $('#CMB_auth_role_div').val(),
                incumbent_div : $('#CMB_incumbent_div').val(),
                pwd_upd_datetime : $('#TXT_pwd_upd_datetime').val(),
                login_datetime : $('#TXT_login_datetime').val(),
                memo : $('#TXA_memo').val()
            },
            success : function(response){
                var result = JSON.parse(JSON.stringify(response));

                let user_cd = $('#TXT_user_cd').val();

                let showNote = function(user_cd) {
                    $('.success p').html('ユーザーを更新しました：' +   user_cd);
                    $('.success').addClass('show_success');
                    setTimeout(function(){
                        $('.success').removeClass('show_success');
                    }, 2000)
                }

                showNote(user_cd);

            },
            
        });
    }
})

// insert

$('#BTN_Save_insert').on('click', function(e){
    CommonModule.Validate();

    if( !CommonModule.Validate()){
        e.preventDefault();
    }else{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            method: 'POST',
            url: 'insert/save', 
            data: {
                user_cd : $('#TXT_user_cd').val(),
                user_nm_j : $('#TXT_user_nm_j').val(),
                user_ab_j : $('#TXT_user_ab_j').val(),
                user_nm_e : $('#TXT_user_nm_e').val(),
                user_ab_e : $('#TXT_user_ab_e').val(),
                pwd : $('#TXT_pwd').val(),
                belong_div : $('#CMB_belong_div').val(),
                position_div : $('#CMB_position_div').val(),
                auth_role_div : $('#CMB_auth_role_div').val(),
                incumbent_div : $('#CMB_incumbent_div').val(),
                pwd_upd_datetime : $('#TXT_pwd_upd_datetime').val(),
                login_datetime : $('#TXT_login_datetime').val(),
                memo : $('#TXA_memo').val()
            },
            success : function(response){
                var result = JSON.parse(JSON.stringify(response));

                console.log(response);

                // let user_cd = $('#TXT_user_cd').val();

                // let showNote = function(user_cd) {
                //     $('.success p').html('ユーザーを更新しました：' +   user_cd);
                //     $('.success').addClass('show_success');
                //     setTimeout(function(){
                //         $('.success').removeClass('show_success');
                //     }, 2000)
                // }

                // showNote(user_cd);

            },
            
        });
    }

});

