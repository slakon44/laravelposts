<?php
//226 to tworzy sie po wpisaniu: php artisan make:request PostsCreateRequest
namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostsCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //226 zmiana z false na true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //226 - przy tym inpucie to jest wymagane
//            'title'=>'required',
//            'category_id'=>'required',
//            'photo_id'=>'required',
//            'body'=>'required'
        ];
    }
}
