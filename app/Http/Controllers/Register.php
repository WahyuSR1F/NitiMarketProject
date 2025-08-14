<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Register extends Controller
{
    protected $register;
    protected $request;
    public function __construct (){

        $this->register = new \App\Factories\Registers();
        $this->requestService = new \App\Service\RequestService();
    }
    public function registeredMemberProcess (Request $request) {
        $method = $request->auth ?? 'register_laravel';
        $validated =  $this->requestService->resolveAuth($method, $request);
        $registerService = $this->register->engine('member');
        return $registerService->register($validated);
    }
}
