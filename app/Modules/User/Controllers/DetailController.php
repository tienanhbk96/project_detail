<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Modles\User;
use App\Modules\User\Modles\Detail;
use DB;


class DetailController extends Controller
{
    public function insert(Request $request){
        
        $belong_divs = DB::table('m_user')->select('belong_div')->distinct()->get();
        $position_divs = DB::table('m_user')->select('position_div')->distinct()->get();
        $auth_role_divs = DB::table('m_user')->select('auth_role_div')->distinct()->get();
        $incumbent_divs = DB::table('m_user')->select('incumbent_div')->distinct()->get();
        return view('User::detail', compact('belong_divs', 'position_divs', 'auth_role_divs', 'incumbent_divs'));    
        
    }


    public function detail($id){

        $belong_divs = DB::table('m_user')->select('belong_div')->distinct()->get();
        $position_divs = DB::table('m_user')->select('position_div')->distinct()->get();
        $auth_role_divs = DB::table('m_user')->select('auth_role_div')->distinct()->get();
        $incumbent_divs = DB::table('m_user')->select('incumbent_div')->distinct()->get();
        $m_user = DB::table('m_user')
        ->where('user_cd',  $id )
        ->get();

        return view('User::detail', compact('m_user', 'belong_divs', 'position_divs', 'auth_role_divs', 'incumbent_divs'));
            
    }

    public function update(Request $rq){
        $m_user = Detail::find($rq->user_cd);
        $m_user->user_nm_j = $rq->user_nm_j;
        $m_user->user_ab_j = $rq->user_ab_j;
        $m_user->user_nm_e = $rq->user_nm_e;
        $m_user->user_ab_e = $rq->user_ab_e;

        $m_user->pwd = $rq->pwd;
        $m_user->belong_div = $rq->belong_div;
        $m_user->position_div = $rq->position_div;
        $m_user->auth_role_div = $rq->auth_role_div;
        $m_user->incumbent_div = $rq->incumbent_div;

        $m_user->pwd_upd_datetime = $rq->pwd_upd_datetime;
        $m_user->login_datetime = $rq->login_datetime;
        $m_user->memo = $rq->memo;
        $m_user->save();
       
        return redirect()->Route('index');
        
    }   
    public function remove($id){
        $m_user =  DB::table('m_user')
        ->where('user_cd',  $id )
        ->delete();

        return redirect()->Route('index');
        
    }

    public function search(Request $request){

        $user_cd = $_POST['user_cd'];
        $m_user =  DB::table('m_user')
        ->where('user_cd',  $user_cd )
        ->get();

        return Response()->json($m_user);
    }

}
