<?php

namespace App\Modules\Working\Controllers;

use App\Modules\Working\Modles\TimeSearchModel;
use App\Modules\Working\Requests\TimeSearchRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class TimeSearchController extends Controller
{

    public function time(TimeSearchRequest $request){

        try {
            $model = new TimeSearchModel();
            $data = $model->SearchUsers($request->all());
            if ($request->ajax()) {
                return view('Working::TimeSearch.TimeTable', ["data" => $data]);
            }
            return view('Working::TimeSearch.TimeIndex', ["data" => $data]);
        }   
            catch(\Exception $e) {
        }
      
    }

    public function detail(Request $request){
        return view('Working::TimeDetail.TimeDetail');
    }
}
