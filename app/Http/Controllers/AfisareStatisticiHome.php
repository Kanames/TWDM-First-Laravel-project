<?php

namespace App\Http\Controllers;

use App\Charts\StatisticiCharts;
use App\Tranzactie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AfisareStatisticiHome extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $user = Auth::user();

        #Creare array de categori inregistrare in DB.
        $valoareMancare = DB::table('tranzacties')->where('categorieTranzactie','Mancare')->where('user_id', $user->id)->count() ;
        $valoareCumparaturi = DB::table('tranzacties')->where('categorieTranzactie','Cumparaturi')->where('user_id', $user->id)->count() ;
        $valoareFacturi = DB::table('tranzacties')->where('categorieTranzactie','Facturi')->where('user_id', $user->id)->count() ;
        $valoareDistractie = DB::table('tranzacties')->where('categorieTranzactie','Distractie')->where('user_id', $user->id)->count() ;
        $valoareDezvoltare = DB::table('tranzacties')->where('categorieTranzactie','Dezvoltare')->where('user_id', $user->id)->count() ;
        $valoareAltele = DB::table('tranzacties')->where('categorieTranzactie','ALTELE')->where('user_id', $user->id)->count() ;


        $statistici = new StatisticiCharts();
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $statistici->minimalist(true);
        $statistici->labels(['Mancare', 'Cumparaturi', 'Facturi', 'Distractie', 'Dezvoltare','ALTELE']);
        $statistici->dataset('Users by trimester', 'doughnut', [$valoareMancare, $valoareCumparaturi, $valoareFacturi, $valoareDistractie, $valoareDezvoltare, $valoareAltele])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

         $isStatisticsAvailabel = ($valoareMancare==null || $valoareMancare==0)
                                && ($valoareCumparaturi==null || $valoareCumparaturi==0)
                                && ($valoareFacturi==null || $valoareFacturi==0)
                                && ($valoareDistractie==null || $valoareDistractie==0)
                                && ($valoareDezvoltare==null || $valoareDezvoltare==0)
                                && ($valoareAltele==null || $valoareAltele==0);

        if($isStatisticsAvailabel){
            toastr()->info('Nu se poate genera statistica fara minim o tranzactie!');
            return redirect()->route('home');
        }else{
            return view('afisareStatisticiHome', [ 'statistici' => $statistici ] );
        }
    }
}
