<?php
/**
 * UserSearchRequest
 * Setting config for check validate data of user search
 *
 * 処理概要/process overview  : UserSearchRequest
 * 作成日/create date         : 2020/05/04
 * 作成者/creater             : quypn
 *
 * 更新日/update date         :
 * 更新者/updater             :
 * 更新内容 /update content   :
 *
 * @package Modules/Users
 * @copyright Copyright (c)
 * @version 1.0.0
 */
namespace App\Modules\Working\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeSearchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            // 'TXT_user_cd'               => 'required|string|max:20',
            // 'TXT_user_nm_j'             => 'required|string|max:50',
            // 'TXT_user_nm_e'             => 'required|string|max:50'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     * @return array
     */
    public function attributes(){
        return [
        ];
    }

    /**
     * custom messages validation
     * @return array
     */
    public function messages(){
        return [
            'required'              => 'E001',
            'max'                   => 'E002',
        ];
    }
}
