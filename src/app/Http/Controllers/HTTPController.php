<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HTTPController extends Controller
{
    public function getAllCodes()
    {
        $querry = Http::get('http://api.nbp.pl/api/exchangerates/tables/a/');
        $querry_decode = json_decode($querry);
        for($i=0; $i<34; $i++) {
            $decode = $querry_decode[0]->rates[$i]->code;
            $choices[$i] = $decode;
        }
        return $choices;
    }
    public function checkCurrency()
    {
        $choices = $this->getAllCodes();
        return view('check-currency', ['choices' => $choices]);
    }
    public function chooseCurrency()
    {
        $choices = $this->getAllCodes();
        return view('add-currency', ['choices' => $choices]);
    }
    public function addCurrency()
    {
        $selected_list = $_POST['check_list'];
        DB::table('users')->where('id', Auth::user()->id)->update(['choices' => $selected_list]);
        return back()->with("status","!");
    }

    public function checkCurrencyQuerry()
    {
        $date = $_POST['date'];
        $choice = $_POST['choice'];

        $querry = Http::get('http://api.nbp.pl/api/exchangerates/rates/a/'.$choice.'/'.$date.'/');

        $querry_decode = json_decode($querry);
        $code = $querry_decode->code;
        $mid = $querry_decode->rates[0]->mid;
        $effectiveDate = $querry_decode->rates[0]->effectiveDate;

        return view('show-check-currency', ['code' => $code, 'effectiveDate' => $effectiveDate, 'mid' => $mid]);
    }
}
