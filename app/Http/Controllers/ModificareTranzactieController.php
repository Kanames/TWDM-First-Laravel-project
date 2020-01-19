<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificareTranzactieController extends Controller
{
    public function modificare(Request $request){
        $idTranzactieUnica = $request->input('idTranzactieUnica');

        $tranzactieUnica = DB::table('tranzacties')
            ->where('id', $idTranzactieUnica)
            ->get();

        return view('tranzactii.modificareTranzactie')
            ->with('tranzactieUnica',$tranzactieUnica[0]);
    }

    public function modificareTranzactie(Request $request){
        $idTranzactieUnica = $request->input('idTranzactieUnica');
        $motivTranzactie = $request->input('motivTranzactie');
        $suma = $request->input('suma');
        $categorieTranzactie = $request->input('categorieTranzactie');
        $sursaMonetara = $request->input('sursaMonetara');

        $tranzactieUnica = DB::table('tranzacties')
            ->where('id', $idTranzactieUnica)
            ->get();

        $isModificare = false;
        if($motivTranzactie != null && $tranzactieUnica[0]->motivTranzactie != $motivTranzactie){
            //dd($motivTranzactie);
            DB::table('tranzacties')
                ->where('id', $idTranzactieUnica)
                ->update(['motivTranzactie' => $motivTranzactie]);
            $tranzactieUnica[0]->motivTranzactie=$motivTranzactie;
            $isModificare=true;
        }
        if($suma != null && $tranzactieUnica[0]->suma != $suma){
           //dd($suma);
            DB::table('tranzacties')
                ->where('id', $idTranzactieUnica)
                ->update(['suma' => $suma]);
            $tranzactieUnica[0]->suma=$suma;
            $isModificare=true;


        }

        if($categorieTranzactie != null && $tranzactieUnica[0]->categorieTranzactie != $categorieTranzactie){
            //dd($categorieTranzactie);
            DB::table('tranzacties')
                ->where('id', $idTranzactieUnica)
                ->update(['categorieTranzactie' => $categorieTranzactie]);
            $tranzactieUnica[0]->categorieTranzactie=$categorieTranzactie;
            $isModificare=true;

        }

        if($sursaMonetara != null && $tranzactieUnica[0]->sursaMonetara != $sursaMonetara){
            //dd($sursaMonetara);
            DB::table('tranzacties')
                ->where('id', $idTranzactieUnica)
                ->update(['sursaMonetara' => $sursaMonetara]);
            $tranzactieUnica[0]->sursaMonetara=$sursaMonetara;
            $isModificare=true;

        }
        if($isModificare){
            toastr()->success('Tranzactie modificata cu success');
        }

        return view('tranzactii.modificareTranzactie')
            ->with('tranzactieUnica',$tranzactieUnica[0]);
    }

    public function stergereTranzactie(Request $request){
        $idTranzactieUnica = $request->input('idTranzactieUnica');
        DB::table('tranzacties')->where('id',  $idTranzactieUnica)->delete();

        $notification = array(
            'message' => 'Tranzactie stearsa cu success!',
            'alert-type' => 'success'
        );
        toastr()->success('Tranzactie stearsa cu success');

        return redirect()->route('toAfisareListaTranzactii')->with($notification);
    }
}
