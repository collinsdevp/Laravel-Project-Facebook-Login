<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use  Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    
    public function getquote(Request $request){
        
        if(!$request->quote){
            return redirect()->back()->with('error','Please enter a stock quote.');
        }

        $json = file_get_contents('https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol='.$request->quote.'&apikey=0O18XUJW9P8QVGQJ');

        $data = json_decode($json,true);

        $id=1;

        return view('stockquote', compact(['data','id']));
    }

   


    public function storequote(Request $request){

        $json = file_get_contents('https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol='.$request->symbol.'&apikey=0O18XUJW9P8QVGQJ');

        $data = json_decode($json,true);

        //check if record doesn't exist
        if(!Stock::where('symbol',$request->symbol)->exists()){
        //save to db
        Stock::create($request->all());
        }

        $id=0;

        return view('stockquote', compact(['id', 'data']));
    }


    public function errorquote(){

        return redirect(route('home.getquote'))->with('errorquote','Unknown Stock Quote. Please try again.');
    }
}
