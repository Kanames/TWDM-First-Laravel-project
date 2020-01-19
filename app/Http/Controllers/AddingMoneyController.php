<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddingMoneyController extends Controller
{
    public function create(){
        return view('tranzactii.creditare');
    }
}
