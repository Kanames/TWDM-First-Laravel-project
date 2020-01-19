<?php

namespace App\Http\Controllers;

use App\Tranzactie;
use App\User;
use Illuminate\Http\Request;

class RegisterCreditareController extends Controller
{
    public function register($user, Request $request){
        $user = User::findOrFail($user); // mai exista si find()

        $validatedData = $request->validate([
            'motivTranzactie' => 'required',
            'sumaDeDebitat' => 'required|numeric',
            'sursaMonetara' => 'required'
        ]);

        Tranzactie::create(array_merge($request->all(),['user_id' => $user->id], ['isCreditare' => 1], ['isDebitare' => 0], ['suma' => $request->input('sumaDeDebitat')]));

        return redirect('home');
    }
}
