<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user){
        //dd($user); //echo
        //dd(User::find($user));

        $user = User::findOrFail($user); // mai exista si find()


        return view('profile',[
            'user' => $user,
        ]);
    }

    public function update($user,Request $request){
        $user = User::findOrFail($user);

        $nume = $request->input('nume');
        if($nume!= null && $nume!=''){
            User::where('id', $user->id)
                ->update(['name' => $nume]);
            $user->name=$nume;
        }

        $prenume = $request->input('prenume');
        if($prenume!= null && $prenume!=''){
            User::where('id', $user->id)
                ->update(['sirname' => $prenume]);
            $user->sirname=$prenume;
        }

        $bday = $request->input('bday');
        if($bday!= null && $bday!=''){
            User::where('id', $user->id)
                ->update(['bday' => $bday]);
            $user->bday=$bday;
        }
        return view('profile',[
            'user' => $user,
        ]);
    }
}
