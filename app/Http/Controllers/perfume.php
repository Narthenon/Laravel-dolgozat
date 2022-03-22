<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class perfume extends Controller
{
    public function save(Request $request){
        print_r( $request->all() );
    }
}

