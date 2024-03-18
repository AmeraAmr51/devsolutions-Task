<?php

namespace App\Http\Requests;

use App\Http\Traits\HttpResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use HttpResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Route::currentRouteName() == 'user.create') {
            return [

                //
                'name' => 'required',
                'phone' => 'required|max:11',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',


            ];
        }
        if (Route::currentRouteName() == 'user.edit') {
            return [

                //
                'name' => 'string',
                'phone' => 'max:11',
                'email' => 'email|unique:users,email',


            ];
        }
        if (Route::currentRouteName() == 'user.login') {
            return [
                'password' => 'required|min:6',
                'email' => 'required|exists:users,email',
            ];
        }
        if (Route::currentRouteName() == 'user.clientInfo') {
            return [
                'client_id' => 'required',

            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->errorResponse($validator->errors()->first())
        );
    }
}