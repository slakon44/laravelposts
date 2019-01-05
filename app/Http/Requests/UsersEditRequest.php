<?php
//213 php artisan make:request UsersEditRequest
namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//213
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //213 - zwraca ale bez password
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',

        ];
    }
}
