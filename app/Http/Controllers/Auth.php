<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Auth extends Controller
{

    protected  $auth;
    protected  $requestService;

    public function __construct( ){
        $this->auth = new \App\Factories\Auth();
        $this->requestService = new \App\Service\RequestService();

    }
    public function loginProccess (Request $request){
        //login
        $method = $request->auth ?? 'laravel';
        $validated =  $this->requestService->resolveAuth($method, $request);
        $authService = $this->auth->engine($method);
        $authService->login($validated);
        return redirect()->route('dashboard');
    }

}
