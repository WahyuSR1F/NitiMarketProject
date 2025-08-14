<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product extends Controller
{
    protected $enginer;

    public function __construct(){
        $this->enginer = new  \App\Factories\Product();
    }

    public function getAll ($search){  
        $search = ['search' => $search];
        $engine = $this->enginer->engine('all');
        return $engine = $engine->excute($search);
    }

    public function getByKatergori (Request $request){
        $parameter =  $request->parameter;
        $engine = $this->enginer->engine('getByKatergori');
        return $engine = $engine->excute($parameter);
    }
}
