<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Charts\GoldChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $days_ago = date('Y-m-d', strtotime('-10 day'));
        $now = date('Y-m-d');
        $querry_gold = Http::get('http://api.nbp.pl/api/cenyzlota/'.$days_ago.'/'.$now.'/');
        $querry_gold_decode = json_decode($querry_gold);

        for($i=0; $i<count($querry_gold_decode); $i++){
            $date =$querry_gold_decode[$i]->data;
            $cost =$querry_gold_decode[$i]->cena;
            $array_date[$i] = $date;
            $array_cost[$i] = $cost;
        }

        $chart = new GoldChart();
        $chart->labels($array_date);
        $chart->dataset('', 'line', $array_cost);


        $favorite = DB::table('users')->where('id', Auth::user()->id)->value('choices');
        $favorite_array = json_decode($favorite);
        $arrays = null;
        if($favorite_array != null) {
            for($i=0; $i<count($favorite_array); $i++)
            {
            $querry = Http::get('http://api.nbp.pl/api/exchangerates/rates/a/'.$favorite_array[$i].'/');
            $querry_decode = json_decode($querry);
            $code = $querry_decode->code;
            $mid = $querry_decode->rates[0]->mid;
            $arrays[$i] = ['code' => $code, 'mid' => $mid];
            }
        }

            return view('home', ['arrays' => $arrays, 'chart' => $chart]);

    }

    public function changePassword()
    {
        return view('change-password');
    }
    public function updatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error",".");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status","!");
    }
    public function deleteAccount() {
        return view('delete-account');
    }
    public function destroyAccount(Request $request) {

        $request->validate([
           'your_password' => 'required',
        ]);

        if(Hash::check($request->your_password, auth()->user()->password)) {
                User::whereId(auth()->user()->id)->delete();
        }

        return back()->with("error","!");

    }
}
