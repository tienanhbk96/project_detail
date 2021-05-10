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

        $user_cd = $_POST['user_cd'];
        $m_user = Detail::find($user_cd);
        
        $m_user->user_nm_j = $_POST['user_nm_j'];
        $m_user->user_ab_j = $_POST['user_ab_j'];
        $m_user->user_nm_e = $_POST['user_nm_e'];
        $m_user->user_ab_e = $_POST['user_ab_e'];

        $m_user->pwd = $_POST['pwd'];
        $m_user->belong_div = $_POST['belong_div'];
        $m_user->position_div = $_POST['position_div'];
        $m_user->auth_role_div = $_POST['auth_role_div'];
        $m_user->incumbent_div = $_POST['incumbent_div'];

        $m_user->pwd_upd_datetime = $_POST['pwd_upd_datetime'];
        $m_user->login_datetime = $_POST['login_datetime'];
        $m_user->memo = $_POST['memo'];
        $m_user->save();
       
        
        return Response()->json($m_user);

        
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


    public function save(Request $rq){
        $user_cd = $_POST['user_cd'];
        $m_user = Detail::find($user_cd);

        if($m_user){
            
            $user_cd = $_POST['user_cd'];
            $m_user = Detail::find($user_cd);
            
            $m_user->user_nm_j = $_POST['user_nm_j'];
            $m_user->user_ab_j = $_POST['user_ab_j'];
            $m_user->user_nm_e = $_POST['user_nm_e'];
            $m_user->user_ab_e = $_POST['user_ab_e'];

            $m_user->pwd = $_POST['pwd'];
            $m_user->belong_div = $_POST['belong_div'];
            $m_user->position_div = $_POST['position_div'];
            $m_user->auth_role_div = $_POST['auth_role_div'];
            $m_user->incumbent_div = $_POST['incumbent_div'];

            $m_user->pwd_upd_datetime = $_POST['pwd_upd_datetime'];
            $m_user->login_datetime = $_POST['login_datetime'];
            $m_user->memo = $_POST['memo'];
            $m_user->save();
            
            $update = true;
            return Response()->json($m_user);

        }else{
            
            $add_user = new Detail();
            
            $add_user->user_cd = $_POST['user_cd'];
            $add_user->user_nm_j = $_POST['user_nm_j'];
            $add_user->user_ab_j = $_POST['user_ab_j'];
            $add_user->user_nm_e = $_POST['user_nm_e'];
            $add_user->user_ab_e = $_POST['user_ab_e'];

            $add_user->pwd = $_POST['pwd'];
            $add_user->belong_div = $_POST['belong_div'];
            $add_user->position_div = $_POST['position_div'];
            $add_user->auth_role_div = $_POST['auth_role_div'];
            $add_user->incumbent_div = $_POST['incumbent_div'];

            $add_user->pwd_upd_datetime = '2021-02-02 00:00:00';
            $add_user->login_datetime = '2021-02-02 00:00:00';
            $add_user->memo = $_POST['memo'];

            $add_user->cre_user_cd = '';
            $add_user->cre_prg_cd = '';
            $add_user->cre_ip = '';
            // $add_user->cre_datetime = '';
            $add_user->upd_user_cd = '';
            $add_user->upd_prg_cd = '';
            $add_user->upd_ip = '';
            // $add_user->upd_datetime = '';
            $add_user->del_user_cd = '';
            $add_user->del_prg_cd = '';
            $add_user->del_ip = '';
            // $add_user->del_datetime = '';
            $add_user->del_flg = '0';
            
            $add_user->save();

            return Response()->json($add_user);
        }

        
        
    }   
}
