
 $('#insert_search').on('click', function(){

    let user_cd = $('#TXT_user_cd').val();

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
            $.each(result, function(key, value){

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
        }
    });
});