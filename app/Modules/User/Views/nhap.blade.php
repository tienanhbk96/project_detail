@if(isset($m_user ))
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
            
            <div class="insert_search">
                <label for="insert_search_item">ユーザーコード</label>
                <div class="insert_search_input">
                    <i class="fas fa-search"></i>
                    <input type="text" id="TXT_user_cd" tabindex="4" value="{{ $m_user[0]->user_cd}}"> 
                </div>
            </div>
            <hr>
            

            <div class="insert_result">
                <label for="">ユーザー名称和文</label>
                <input type="text" id="TXT_user_nm_j" class="insert_ime requied" max="7" min="3" tabindex="5" value="{{ $m_user[0]->user_nm_j}}">
                <span></span><br>

                <label for="">ユーザー略称和文</label>
                <input type="text" id="TXT_user_ab_j" class="insert_ime" max="3" tabindex="6" value="{{ $m_user[0]->user_ab_j}}">
                <span></span><br>

                <label for="">ユーザー名称英文</label>
                <input type="text" id="TXT_user_nm_e" class="insert_ime-disable" max="5" min="3" tabindex="7" value="{{ $m_user[0]->user_nm_e}}">
                <span></span><br>

                <label for="">ユーザー略称英文</label>
                <input type="text" id="TXT_user_ab_e" class="insert_ime-disable" tabindex="8" value="{{ $m_user[0]->user_ab_e}}">
                <span></span><br>

                <label for="" >パスワード</label>
                <input type="password" id="TXT_pwd" class="insert_ime-disable" tabindex="9"  value="{{ $m_user[0]->pwd}}">
                <span></span><br>

                <label for="">所属区分</label>
                <select name="" id="CMB_belong_div" tabindex="10">
                    @foreach( $belong_divs as $user)
                    <option value="{{$user->belong_div}}" selected="selected">{{$user->belong_div}}</option>
                    @endforeach
                </select><br><br>

                <label for="">役職区分</label>
                <select name="" id="CMB_position_div" tabindex="11" value="{{ $position_divs[0]->position_div}}">
                    @foreach( $position_divs as $user)
                        <option value="">{{$user->position_div}}</option>
                    
                    @endforeach
                </select><br><br>

                <label for="">権限区分</label>
                <select name="" id="CMB_auth_role_div" tabindex="12" value="{{ $auth_role_divs[0]->auth_role_div}}">
                    @foreach( $auth_role_divs as $user)
                    <option value="">{{$user->auth_role_div}}</option>
                    
                    @endforeach
                </select><br><br>

                <label for="">在職区分</label>
                <select name="" id="CMB_incumbent_div" tabindex="13" value="{{ $incumbent_divs[0]->incumbent_div }}">
                    @foreach( $incumbent_divs as $user)
                    <option value="">{{$user->incumbent_div}}</option>
                    
                    @endforeach
                </select><br><br>


                <label for="" class="label-black">パスワード変更日時</label>
                <input type="text" id="TXT_pwd_upd_datetime" class="" disabled value="{{ $m_user[0]->pwd_upd_datetime }}"><br><br>

                <label for="" class="label-black">最終ログイン日時</label>
                <input type="text" id="TXT_login_datetime" class="" disabled value="{{ $m_user[0]->login_datetime }}"><br><br>

                <label for="" class="label-black label-top">メモ</label>
                <textarea id="TXA_memo" name="" rows="4" cols="90" value="{{ $m_user[0]->incumbent_div }}"></textarea>
            </div>
        </div>
    @endsection
@else

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
            
            <div class="insert_search">
                <label for="insert_search_item">ユーザーコード</label>
                <div class="insert_search_input">
                    <i class="fas fa-search"></i>
                    <input type="text" id="TXT_user_cd" tabindex="4" value=""> 
                </div>
            </div>
            <hr>
            
            <div class="insert_result">
                <label for="">ユーザー名称和文</label>
                <input type="text" id="TXT_user_nm_j" class="insert_ime requied" max="7" min="3" tabindex="5" value="">
                <span></span><br>

                <label for="">ユーザー略称和文</label>
                <input type="text" id="TXT_user_ab_j" class="insert_ime" max="3" tabindex="6" value="">
                <span></span><br>

                <label for="">ユーザー名称英文</label>
                <input type="text" id="TXT_user_nm_e" class="insert_ime-disable" max="5" min="3" tabindex="7" value="">
                <span></span><br>

                <label for="">ユーザー略称英文</label>
                <input type="text" id="TXT_user_ab_e" class="insert_ime-disable" tabindex="8" value="">
                <span></span><br>

                <label for="" >パスワード</label>
                <input type="password" id="TXT_pwd" class="insert_ime-disable" tabindex="9"  value="">
                <span></span><br>

                <label for="">所属区分</label>
                <select name="" id="CMB_belong_div" tabindex="10">
                    @foreach( $belong_divs as $user)
                    <option value="{{$user->belong_div}}" selected="selected">{{$user->belong_div}}</option>
                    @endforeach
                </select><br><br>

                <label for="">役職区分</label>
                <select name="" id="CMB_position_div" tabindex="11" value="{{ $position_divs[0]->position_div}}">
                    @foreach( $position_divs as $user)
                        <option value="">{{$user->position_div}}</option>
                    
                    @endforeach
                </select><br><br>

                <label for="">権限区分</label>
                <select name="" id="CMB_auth_role_div" tabindex="12" value="{{ $auth_role_divs[0]->auth_role_div}}">
                    @foreach( $auth_role_divs as $user)
                    <option value="">{{$user->auth_role_div}}</option>
                    
                    @endforeach
                </select><br><br>

                <label for="">在職区分</label>
                <select name="" id="CMB_incumbent_div" tabindex="13" value="{{ $incumbent_divs[0]->incumbent_div }}">
                    @foreach( $incumbent_divs as $user)
                    <option value="">{{$user->incumbent_div}}</option>
                    
                    @endforeach
                </select><br><br>


                <label for="" class="label-black">パスワード変更日時</label>
                <input type="text" id="TXT_pwd_upd_datetime" class="" disabled value=""><br><br>

                <label for="" class="label-black">最終ログイン日時</label>
                <input type="text" id="TXT_login_datetime" class="" disabled value=""><br><br>

                <label for="" class="label-black label-top">メモ</label>
                <textarea id="TXA_memo" name="" rows="4" cols="90" value=""></textarea>
            </div>
        </div>
    @endsection

@endif
