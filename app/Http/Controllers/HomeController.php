<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if(Auth::guest()){
            return redirect("/");
        }
        Log::info('Showing user home for user: '.$user->id);

        $tranzactii = DB::table('tranzacties')
            ->where('user_id', $user->id)
            ->limit(5)
            ->orderByDesc('id')
            ->get();
        Log::debug('Showing user home for user: '.$tranzactii);

        return view('home')->with(compact('tranzactii'));
    }
}
