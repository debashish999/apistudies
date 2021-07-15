<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyapi extends Controller
{
    //
    public function getdata(){
        
        return ["name" => "debashish",
                "email" => "dad1@test.com",
                "age" => "22"
    ];
    }
    
}
