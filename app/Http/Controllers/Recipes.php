<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Recipes extends Controller
{
    public function indexRecips(Request $request){

        return view('recips') ;
     }

}
