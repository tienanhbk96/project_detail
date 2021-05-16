@section('title')
Time Detail
@endsection

@extends('welcome')

@section('asset_header')
    <link href="{{asset('css/working/working.css')}}" rel="stylesheet">

@stop

@section('header_button')
    <a href="#"id="BTN_Back" tabindex="1">
        <i class="fas fa-reply"></i>
            戻る
    </a>
    <a for="" id="BTN_Save" tabindex="2">
        <i class="far fa-save"></i>
        保存
    </a>  
    <a href="#" id="BTN_Delete" tabindex="3">
        <i class="far fa-trash-alt"></i>
            消除
    </a>
@stop

@section('content')
<div class="insert">
        <div class="insert_header">
            <div class="insert_header_left">
                <p>作業時間入力</p>
            </div>
            <div class="insert_header_right">
                <p id="">登録者</p>
                <p id="DSP_cre_user_cd">999</p>
                <p id="DSP_cre_user_nm">アペレ 太郎</p>
                <p id="">登録日</p>
                <p id="DSP_cre_datetime">yyy/mm/dd hh:mm:ss</p>
                <p id="">更新者</p>
                <p id="DSP_upd_user_cd">999</p>
                <p id="DSP_upd_user_nm">アペレ 太郎</p>
                <p id="">更新日</p>
                <p id="DSP_upd_datetime">yyy/mm/dd hh:mm:ss</p>
            </div>
        </div>
        <hr>
        <div class="insert_search">
            <label for="insert_search_item">作業日報番号</label>
            <div class="insert_search_input">
                <i class="fas fa-search"></i>
                <input type="text" id="TXT_work_report_no" tabindex="4"> 
            </div>
        </div>
        <hr>
        <div class="insert_result">
            
            <form class="insert_result"　id="update_submit">
                
                <label for="">作業実施日</label>
                <input name="TXT_work_date" type="date" id="TXT_work_date" class="insert_ime" tabindex="5">
                <span></span>

                <label for="">作業担当者</label>
                <div class="time_table_input">
                    <input name="TXT_work_user_cd" type="text" id="TXT_work_user_cd" class="insert_ime" tabindex="6">
                    <i class="fas fa-search"></i>
                </div>
                <span></span>
                
                

                <table id="time_table">
                    <thead>
                        <tr>
                            <th id="time_no">NO</th>
                            <th id="time_man">製造指示番号</th>
                            <th id="time_j">製品名</th>
                            <th id="time_hour">作業時間</th>
                            <th id="time_remove"><i class="fas fa-plus-circle"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <div class="time_table_input">
                                    <i class="fas fa-search"></i>
                                    <input type="text" id="TXT_user_cd" tabindex="4"> 
                                </div>
                            </td>
                            <td>Name</td>
                            <td class="time_hour">
                                <select name="" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <p>時間</p>
                                <select name="" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <p>分</p>
                            </td>
                            <td class="delete"><i class="far fa-times-circle"></i></td>
                        </tr>
                    </tbody>
                </table>

                <div id="total">
                    <p>合計作業時間</p>
                    <p id="hour_detail">99</p>
                    <p>時間</p>
                    <p id="second">99</p>
                    <p>分</p>
                </div>

                <label for="" class="label-black label-top">メモ</label>
                <textarea id="TXA_memo" name="memo" rows="4" cols="90"></textarea>
            </form>

        </div>
    </div>
@endsection
