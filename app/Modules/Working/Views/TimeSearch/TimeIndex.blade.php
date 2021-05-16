
@section('title')
    Time search
@endsection

@section('asset_header')

@stop


@extends('welcome')

@section('header_button')
    <a id="BTN_Search" tabindex='1'>
        <i class="fas fa-search"></i>
        検索
    </a>
    <a href="time-detail" id="BTN_Add_new" tabindex='2' >
        <i class="fas fa-plus"></i>
        新規追加
    </a>
    <a href="#" id="BTN_output" tabindex='2' >
        <i class="far fa-save"></i>
        出力
    </a>
@stop


@section('content')

    @include('Working::TimeSearch.TimeCondition')
    <div id="workSearch_result">
        @include('Working::TimeSearch.TimeTable')
    </div>

@endsection

@section('asset_footer')
    <script src="{{asset('js/working/working.js')}}"></script>
    <script src="{{asset('js/users/main.js')}}"></script>
@stop
