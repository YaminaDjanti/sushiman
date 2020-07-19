<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    public function home(){


        return view('client.home');
        
    }
     public function shop(){

        //dd(Cart::content());
         $produits = DB::table('produits')
            ->where('status',1)
            ->paginate(8);

         $manager_produits = view('client.shop')
            ->with('produits', $produits);

    return view('layouts.app')
            ->with('client.shop',$manager_produits);
   }
   


    public function panier(){
    return view('client.panier');
   }
   
    public function about(){
    return view('client.about');
   }
   
    public function mentions(){
    return view('client.mentions');
   }
    public function conditions(){
    return view('client.conditions');
   }
    
   
  
}
