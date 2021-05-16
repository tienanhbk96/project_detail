
<div class="panel table-result">
    <div>
        <select id="per_page">
            <option value="10" @if($data['per_page'] == 10)selected="selected"@endif>10件</option>
            <option value="20" @if($data['per_page'] == 20)selected="selected"@endif>20件</option>
            <option value="50" @if($data['per_page'] == 50)selected="selected"@endif>50件</option>
            <option value="100" @if($data['per_page'] == 100)selected="selected"@endif>100件</option>
        </select>
        @if(count($data['data']) > 0)
            <span>{{$data['total']}}件中{{$data['from']}}-{{$data['to']}}件</span>
            <ul class="pagination">
            </ul>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th id="DSP_work_report_no">作業日報番号</th>
                    <th id="DSP_manufacture_no">製造指示番号</th>
                    <th id="DSP_work_date">作業実施日</th>
                    <th id="DSP_work_user_cd">作業担当者コード</th>
                    <th id="DSP_user_nm_j">作業担名</th>
                    <th id="DSP_work_hour_div">作業時間</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['data']) == 0)
                    <tr>
                        <td colspan="6">データがありません。</td>
                    </tr>

                @else
                    @foreach($data['data'] as $key => $m_user)
                        <tr>
                            <td>{{$m_user->work_report_no}}</td>
                            <td>{{$m_user->manufacture_no  }}</td>
                            <td>{{$m_user->work_date }}</td>
                            <td>{{$m_user->work_user_cd }}</td>
                            <td>{{$m_user->user_nm_j}}</td>
                            <td>{{$m_user->work_hour_div + $m_user->work_time_div}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @if(count($data['data']) > 0)
        <div>
            <ul class="pagination">
            </ul>
        </div>
    @endif
    <input type="hidden" id="total" value="{{$data['last_page']}}">
    <input type="hidden" id="page" value="{{$data['current_page']}}">
</div>
