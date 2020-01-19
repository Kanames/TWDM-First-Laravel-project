<?php

namespace App\Http\Controllers;

use App\Tranzactie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterDebitareController extends Controller
{
    public function register($user, Request $request){
        $user = User::findOrFail($user); // mai exista si find()

        $validatedData = $request->validate([
            'motivTranzactie' => 'required',
            'categorieTranzactie' => 'required',
            'sumaDeDebitat' => 'required|numeric',
            'sursaMonetara' => 'required'
        ]);
        Tranzactie::create(array_merge($request->all(),['user_id' => $user->id], ['isCreditare' => 0], ['isDebitare' => 1], ['suma' => $request->input('sumaDeDebitat')]));

        return redirect('home');
    }

}
