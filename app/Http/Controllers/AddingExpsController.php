<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AddingExpsController extends Controller
{
    public function create(){
        return view('tranzactii.debitare');
    }
}
