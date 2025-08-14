<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Livewire\Component;

class LoginForm extends Component
{
    public string $email;
    public string $password;

    public function render()
    {
        return view('livewire.auth.login-form')->layout('layouts.app');
    }

    public function  login (){
        try{
           $request =  new Request();
           $request->merge([
               'email' => $this->email,
               'password' => $this->password,
           ]);
           $controller = new \App\Http\Controllers\Auth();
           $controller->loginProccess($request);
           
        }catch (ValidationException $e){
           foreach ($e->validator->errors()->getMessages() as $field => $messages) {
               foreach ($messages as $message) {
                   $this->addError($field, $message);
               }
           }
        }
         
    }
}
