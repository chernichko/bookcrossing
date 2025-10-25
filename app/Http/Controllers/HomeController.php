<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $a = '1';
        $b = &$a;
        $b = "2$b";

        echo $a . "\n";
        echo $b;

        // $x = 5;

        // echo $x+++$x++;
        // echo $x---$x--;
        // echo $x;
        //return view('home');
    }
}
