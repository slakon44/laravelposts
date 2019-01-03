<?php
//stworzylem ten plik w //201 php artisan make:request UsersRequest
namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       //201 return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //201
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',
            'password' => 'required',

        ];
    }
}
