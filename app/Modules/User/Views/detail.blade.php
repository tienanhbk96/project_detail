i    

@section('title')
    insert
@endsection

@extends('welcome')
@section('header_button')
    <a href="{{route('index')}}"id="BTN_Back" tabindex="1">
        <i class="fas fa-reply"></i>
            戻る
    </a>
            
    <label for="update_submit" id="BTN_Save" tabindex="2">
        <i class="far fa-save"></i>
        保存
    </label>
@if(isset($m_user))    
    <a href="remove/{{$m_user[0]->user_cd}}" id="BTN_Delete" tabindex="3">
        <i class="far fa-trash-alt"></i>
            消除
    </a>
@else
    <a href="" id="BTN_Delete" tabindex="3">
        <i class="far fa-trash-alt"></i>
            消除
    </a>
@endif

@stop


@if(isset($m_user))
    @section('content')
        <div class="insert">
            <div class="insert_header">
                <div class="insert_header_left">
                    <p>ユーザーマスタメンテナンス</p>
                </div>
                <div class="insert_header_right">
                    <p id="">登録者</p>
                    <p id="DSP_cre_user_cd">999</p>
                    <p id="DSP_cre_user_nm">{{ $m_user[0]->user_nm_j}}</p>
                    <p id="">登録日</p>
                    <p id="DSP_cre_datetime">yyy/mm/dd hh:mm:ss</p>
                    <p id="">更新者</p>
                    <p id="DSP_upd_user_cd">999</p>
                    <p id="DSP_upd_user_nm">{{ $m_user[0]->user_nm_j}}</p>
                    <p id="">更新日</p>
                    <p id="DSP_upd_datetime">yyy/mm/dd hh:mm:ss</p>
                </div>
            </div>
            <hr>
            
           
            

            <form class="insert_result" action="{{route('update')}}" method="post">
                <button type="submit" id="update_submit"></button>
                <div class="insert_search">
                    <label for="insert_search_item">ユーザーコード</label>
                    <div class="insert_search_input">
                        <input name="user_cd" type="text" id="TXT_user_cd" tabindex="4" value="{{ $m_user[0]->user_cd}}"> 
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <hr>
                
                <label for="">ユーザー名称和文</label>
                <input name="user_nm_j" type="text" id="TXT_user_nm_j" class="insert_ime requied" tabindex="5" value="{{ $m_user[0]->user_nm_j}}">
                <span></span><br>

                <label for="">ユーザー略称和文</label>
                <input name="user_ab_j" type="text" id="TXT_user_ab_j" class="insert_ime"tabindex="6" value="{{ $m_user[0]->user_ab_j}}">
                <span></span><br>

                <label for="">ユーザー名称英文</label>
                <input name="user_nm_e" type="text" id="TXT_user_nm_e" class="insert_ime-disable" max="5" min="3" tabindex="7" value="{{ $m_user[0]->user_nm_e}}">
                <span></span><br>

                <label for="">ユーザー略称英文</label>
                <input name="user_ab_e" type="text" id="TXT_user_ab_e" class="insert_ime-disable" tabindex="8" value="{{ $m_user[0]->user_ab_e}}">
                <span></span><br>

                <label for="" >パスワード</label>
                <input name="pwd" type="password" id="TXT_pwd" class="insert_ime-disable" tabindex="9"  value="{{ $m_user[0]->pwd}}">
                <span></span><br>

                <label for="">所属区分</label>
                <select name="belong_div" id="CMB_belong_div" tabindex="10">
                    @foreach( $belong_divs as $user)
                    <option value="{{$user->belong_div}}" <?php if($user->belong_div == $m_user[0]->belong_div ): ?>
                        selected="selected"  
                <?php endif ?>>{{$user->belong_div}}</option>
                    @endforeach
                </select><br><br>

                <label for="">役職区分</label>
                <select name="position_div" id="CMB_position_div" tabindex="11" value="">
                    @foreach( $position_divs as $user)
                    <option value="{{ $user->position_div}}" 
                                selected="selected"  
                             >{{$user->position_div}}</option>
                    @endforeach
                </select><br><br>

                <label for="">権限区分</label>
                <select name="auth_role_div" id="CMB_auth_role_div" tabindex="12" value="">
                    @foreach( $auth_role_divs as $user)
                    <option value="{{ $user->auth_role_div}}"
                            <?php if($user->auth_role_div == $m_user[0]->auth_role_div ): ?>
                                selected="selected"  
                            <?php endif ?> >{{$user->auth_role_div}}</option>
                    @endforeach
                </select><br><br>

                <label for="">在職区分</label>
                <select name="incumbent_div" id="CMB_incumbent_div" tabindex="13" value="">
                    @foreach( $incumbent_divs as $user)
                        <option value="{{ $user->incumbent_div }}"
                             <?php if($user->incumbent_div == $m_user[0]->incumbent_div ): ?>
                                selected="selected"  
                            <?php endif ?> >{{$user->incumbent_div}}</option>
                    @endforeach
                </select><br><br>


                <label for="" class="label-black">パスワード変更日時</label>
                <input name="pwd_upd_datetime" type="text" id="TXT_pwd_upd_datetime" class="" disabled value="{{ $m_user[0]->pwd_upd_datetime}}"><br><br>
                                    
                <label for="" class="label-black">最終ログイン日時</label>
                <input name="login_datetime" type="text" id="TXT_login_datetime" class="" disabled value="{{$m_user[0]->login_datetime}}"><br><br>

                <label for="" class="label-black label-top">メモ</label>
                <textarea id="TXA_memo" name="memo" rows="4" cols="90">{{$m_user[0]->memo}}</textarea>
                <br>
                
            </form>
        </div>
    @endsection
@else
                                        <!-- insert -->
    @section('content')
        <div class="insert">
            <div class="insert_header">
                <div class="insert_header_left">
                    <p>ユーザーマスタメンテナンス</p>
                </div>
                <div class="insert_header_right">
                    <p id="">登録者</p>
                    <p id="DSP_cre_user_cd">999</p>
                    <p id="DSP_cre_user_nm"></p>
                    <p id="">登録日</p>
                    <p id="DSP_cre_datetime">yyy/mm/dd hh:mm:ss</p>
                    <p id="">更新者</p>
                    <p id="DSP_upd_user_cd">999</p>
                    <p id="DSP_upd_user_nm"></p>
                    <p id="">更新日</p>
                    <p id="DSP_upd_datetime">yyy/mm/dd hh:mm:ss</p>
                </div>
            </div>
            <hr>

            <form class="insert_result" action="{{route('update')}}" method="post">
                <button type="submit" id="update_submit"></button>
                <div class="insert_search">
                    <label for="insert_search_item">ユーザーコード</label>
                    <div class="insert_search_input">
                        <input name="user_cd" type="text" id="TXT_user_cd" tabindex="4" value=""> 
                        <i class="fas fa-search" id="insert_search"></i>
                    </div>
                </div>
                <hr>
                
                <label for="">ユーザー名称和文</label>
                <input name="user_nm_j" type="text" id="TXT_user_nm_j" class="insert_ime requied" tabindex="5" value="">
                <span></span><br>

                <label for="">ユーザー略称和文</label>
                <input name="user_ab_j" type="text" id="TXT_user_ab_j" class="insert_ime"tabindex="6" value="">
                <span></span><br>

                <label for="">ユーザー名称英文</label>
                <input name="user_nm_e" type="text" id="TXT_user_nm_e" class="insert_ime-disable" max="5" min="3" tabindex="7" value="">
                <span></span><br>

                <label for="">ユーザー略称英文</label>
                <input name="user_ab_e" type="text" id="TXT_user_ab_e" class="insert_ime-disable" tabindex="8" value="">
                <span></span><br>

                <label for="" >パスワード</label>
                <input name="pwd" type="password" id="TXT_pwd" class="insert_ime-disable" tabindex="9"  value="">
                <span></span><br>

                <label for="">所属区分</label>
                <select name="belong_div" id="CMB_belong_div" tabindex="10">
                    @foreach( $belong_divs as $user)
                        <option value="{{$user->belong_div}}">{{$user->belong_div}}</option>
                    @endforeach
                </select><br><br>

                <label for="">役職区分</label>
                <select name="position_div" id="CMB_position_div" tabindex="11" value="">
                    @foreach( $position_divs as $user)
                        <option value="{{ $user->position_div}}">{{$user->position_div}}</option>
                    @endforeach
                </select><br><br>

                <label for="">権限区分</label>
                <select name="auth_role_div" id="CMB_auth_role_div" tabindex="12" value="">
                    @foreach( $auth_role_divs as $user)
                    <option value="{{ $user->auth_role_div}}">{{$user->auth_role_div}}</option>
                    @endforeach
                </select><br><br>

                <label for="">在職区分</label>
                <select name="incumbent_div" id="CMB_incumbent_div" tabindex="13" value="">
                    @foreach( $incumbent_divs as $user)
                        <option value="{{ $user->incumbent_div }}">{{$user->incumbent_div}}</option>
                    @endforeach
                </select><br><br>


                <label for="" class="label-black">パスワード変更日時</label>
                <input name="pwd_upd_datetime" type="text" id="TXT_pwd_upd_datetime" class="" disabled value=""><br><br>
                                    
                <label for="" class="label-black">最終ログイン日時</label>
                <input name="login_datetime" type="text" id="TXT_login_datetime" class="" disabled value=""><br><br>

                <label for="" class="label-black label-top">メモ</label>
                <textarea id="TXA_memo" name="memo" rows="4" cols="90"></textarea>
                <br>
            </form>
        </div>
    @endsection

@endif




