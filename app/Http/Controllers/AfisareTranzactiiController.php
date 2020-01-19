<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AfisareTranzactiiController extends Controller
{
    /**
     *
     * @return Returneaza un view ce contine lista de tranzactii efectuate pe contul autentificat actual.
     */
    public function index(){
        $user = Auth::user();
        if(Auth::guest()){
            Log::info('Session expired going back home for user with id: '.$user->id);
            return redirect("/");
        }

        $tranzactii = DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->orderByDesc('id')
            ->get();

        $portofelValuePoz = DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->where('isCreditare', 1)
            ->where('sursaMonetara', 'Portofel')
            ->get()->sum("suma");

        $portofelValueNeg = DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->where('isCreditare', 0)
            ->where('sursaMonetara', 'Portofel')
            ->get()->sum("suma");

        $cardBancarValueNeg =  DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->where('isCreditare', 0)
            ->where('sursaMonetara', 'CardBancar')
            ->get()->sum("suma");

        $cardBancarValuePoz =  DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->where('isCreditare', 1)
            ->where('sursaMonetara', 'CardBancar')
            ->get()->sum("suma");

        return view('afisare_lista_tranzactii')
            ->with(compact('tranzactii'))
            ->with('portofelValue',$portofelValuePoz-$portofelValueNeg)
            ->with('cardBancarValue',$cardBancarValuePoz-$cardBancarValueNeg);
    }

    public function ordonare(Request $request){
        $orderByArray = $request->input('orderBy');

        $user = Auth::user();

        $orderBy = explode(" ", $orderByArray);

        $tranzactii = DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->orderBy($orderBy[0],$orderBy[1])
            ->get();

        $portofelValuePoz = DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->where('isCreditare', 1)
            ->where('sursaMonetara', 'Portofel')
            ->get()->sum("suma");

        $portofelValueNeg = DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->where('isCreditare', 0)
            ->where('sursaMonetara', 'Portofel')
            ->get()->sum("suma");

        $cardBancarValueNeg =  DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->where('isCreditare', 0)
            ->where('sursaMonetara', 'CardBancar')
            ->get()->sum("suma");

        $cardBancarValuePoz =  DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->where('isCreditare', 1)
            ->where('sursaMonetara', 'CardBancar')
            ->get()->sum("suma");

        return view('statisticiHome')
            ->with('tranzactii',$tranzactii)
            ->with('orderBy',$orderByArray)
            ->with('portofelValue',$portofelValuePoz-$portofelValueNeg)
            ->with('cardBancarValue',$cardBancarValuePoz-$cardBancarValueNeg);
    }
}
