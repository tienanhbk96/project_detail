<style>
    .page-link {
        width: 30px;
        height: 30px;
        padding: 0.2rem 0.5rem;
        margin: 0px 10px;

    }

    .active  .page-link{
        padding: 0.2rem 0.5rem;
    }

    .page-item.disabled .page-link{
        padding: 0.2rem 0.5rem;
    }
</style>

@section('title')
    search
@endsection


@extends('welcome')


@section('asset_footer')
<script src=" {{asset('js/users/validator.js')}}"></script>
<script src="{{asset('js/users/main.js')}}"></script>
<script src="{{asset('js/users/insert.js')}}"></script>
@stop


@section('header_button')
    <a href="#" id="BTN_Search" tabindex='1'>
        <i class="fas fa-search"></i>
        検索
    </a>
        
    <a href="insert" id="BTN_Add_new" tabindex='2' >
        <i class="fas fa-plus"></i>
        新規追加
    </a>
@stop


@section('content')
<div id="condition">
    <div id="condition_header">
        <div id="condition_title">
            ユーザーマスタ一覧
        </div>
        <div id="condition_toggle">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
    <hr>
    <form id="condition_input" method="post">

        <label for="TXT_user_cd">ユーザーコード</label>
        <input type="text" id="TXT_user_cd" class="number-only required">
        <span></span>

        <label for="TXT_user_nm_j">ユーザー名称和文</label>
        <input type="text" id="TXT_user_nm_j" class="required">
        <span></span>

        <label for="TXT_user_nm_e">ユーザー名称英文</label>
        <input type="text" id="TXT_user_nm_e" class='required'>
        <span></span>
    </form>
</div>

    <div id="result">
        <div id="result_header">
            <div id="result_header_left">
                <div id="result_header_select">
                    <select name="" id="">
                        <option value="10">10　件</option>
                        <option value="20">20　件</option>
                        <option value="30">30　件</option>
                        <option value="40">40　件</option>
                    </select>
                    200件中　51-55件
                </div>
            </div>
            <div id="result_header_right">
                {!! $data->links("pagination::bootstrap-4") !!}
            </div>
        </div>
        <div >
            <table id="result_table">
            <thead>
                <tr>
                    <th id="DSP_user_cd">ユーザーコード</th>
                    <th id="DSP_user_nm_j">ユーザー名称和文</th>
                    <th id="DSP_user_ab_j">ユーザー略称和文</th>
                    <th id="DSP_user_nm_e">ユーザー名称英文</th>
                    <th id="DSP_user_ab_e">ユーザー略称英文</th>
                    <th id="DSP_auth_role_div">権限区分</th>
                    <th id="DSP_incumbent_div">在職区分</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $m_user)
                <tr>
                    <td ><a href='detail/{{$m_user->user_cd}}'>{{$m_user->user_cd }} </a></td>
                    <td >{{$m_user->user_nm_j }} </td>
                    <td >{{$m_user->user_ab_j }} </td>  
                    <td >{{$m_user->user_nm_e }} </td>
                    <td >{{$m_user->user_ab_e }} </td>
                    <td>{{$m_user->lib_val_nm_j}}</td>
                    <td>{{$m_user->lib_val_nm_js}}</td>
                </tr>
                @endforeach

            </tbody>

           
            </table>
        </div>
        <div id="result_bottom">
            
            {!! $data->links("pagination::bootstrap-4") !!}
        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- <script>
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
    event.preventDefault(); 
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
});

    function fetch_data(page){
        $.ajax({
            url:"/index/fetch_data?page="+page,
            success:function(m_users)
            {
                $('#result_table').html(m_users);
            }
        });
    }
 
 });
</script> -->