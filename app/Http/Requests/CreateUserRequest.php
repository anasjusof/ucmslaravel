<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\User;

class CreateUserRequest extends Request
{
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
        $user = User::find($this->user);

        if($this->method() == 'POST')
        {
            return [
                'name'=>'required',
                'email'=>'required | email | unique:users,email',
                'password'=>'required | min:4',
            ];
        }

        if($this->method() == 'PUT' || $this->method() == 'PATCH')
        {
            return [
                'name'=>'required',
                'email'=>'required | email',
            ];
        }
        
    }
}
