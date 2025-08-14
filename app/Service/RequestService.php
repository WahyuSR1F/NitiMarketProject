<?php

namespace App\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RequestService
{
    protected $requestFactory;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->requestFactory = new \App\Factories\Request();
        
    }

    public function resolveAuth (string $method, Request $request){
        $formRequest = $this->requestFactory->engine($method);
        if (!$formRequest instanceof FormRequest) {
            throw new \InvalidArgumentException("Factory harus mengembalikan instance FormRequest.");
        }
        
        $formRequest->setContainer(app())
                    ->setRedirector(app('redirect'));

        $formRequest->merge($request->all());
        $formRequest->validateResolved();

        return $formRequest->validated();
    }
}
