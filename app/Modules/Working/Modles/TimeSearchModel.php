<?php

namespace App\Modules\Working\Modles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TimeSearchModel extends Model
{
    public function SearchUsers($condition) {
        try {
            $data = DB::table('t_work_report_h as h')

            ->join("t_work_report_d as d", "h.work_report_no", "=", "d.work_report_no")
            
            ->join("m_user as m", "h.work_user_cd", "=", "m.user_cd");
            
            if(isset($condition['TXT_work_report_no']) && $condition['TXT_work_report_no'] != ''){
                $data->where('h.work_report_no', 'LIKE', '%' . $condition['TXT_work_report_no'] . '%');
            };

            if(isset($condition['TXT_work_user_cd']) && $condition['TXT_work_user_cd'] != ''){
                $data->where('h.work_user_cd', 'LIKE', '%' . $condition['TXT_work_user_cd'] . '%');
            };
            
            if(isset($condition['TXT_user_nm_j']) && $condition['TXT_user_nm_j'] != ''){
                $data->where('m.user_nm_j', 'LIKE', '%' . $condition['TXT_user_nm_j'] . '%')
                    ->orWhere('m.user_nm_e' , 'LIKE', '%' . $condition['TXT_user_nm_j'] . '%');
            };

            if(isset($condition['TXT_manufacture_no']) && $condition['TXT_manufacture_no'] != ''){
                $data->where('d.manufacture_no', '=',  $condition['TXT_manufacture_no'] );
            };

            if(isset($condition['TXT_working_date_from']) && $condition['TXT_working_date_from'] != '' ){
                $data->whereDate('h.work_date','>=', $condition['TXT_working_date_from']);
            };

            if(isset($condition['TXT_working_date_to']) && $condition['TXT_working_date_to'] != '' ){
                $data->whereDate('h.work_date','<=', $condition['TXT_working_date_to']);
            };
            
            return
                $data
                ->select('d.work_report_no', 'd.manufacture_no' ,'h.work_date', 'h.work_user_cd', 'm.user_nm_j', 'd.work_hour_div', 'd.work_time_div')
                ->paginate(
                    isset($condition['per_page']) && $condition['per_page'] != '' ? $condition['per_page'] : 10,
                    [
                        'page' => isset($condition['page']) && $condition['page'] != '' ? $condition['page'] : 1
                    ])->toArray();

        }
        catch(\Exception $e) {
            throw $e;
        }
    }
}
