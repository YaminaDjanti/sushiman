<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Panier;
use Illuminate\Support\Facades\View;

class SingleProductController extends Controller
{
    public function single_product($id = null){
        $produit =  DB::table('produits')
                        ->where('id',$id)
                        ->first();
            

        // $produitDetails =  DB::table('produits')
        //                 ->where('id',$id)
        //                 ->first();
                        
    
        //$manage_produits = view('client.single_product')
                        //->with('produits', $produits);
    
    
        // return view('client.single_product')
        //         ->with(compact('produitDetails'));
        return view('client.single_product')
                 ->with(compact('produit'));
                              
   }
   public function ajouter_au_panierSingleProduct($id,$qty){
        $produit = DB::table('produits')
                ->where('id',$id)
                ->first();
        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);
        $panier->add($produit,$id,$qty);

        Session::put('panier',$panier);

        Session::put('message','Votre produit '.$produit->nom_produit.' a été ajoutée au panier.');

        //dd(Session::get('panier'));
        return view('client.single_product')
            ->with(compact('produit'));

    }
    public function modifierQtySingleProduct(Request $request){
        //print('qty'.$request->quantity.'id'.$request->id);
        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);
        $panier->modifierQty($request->quantity,$request->id);
        Session::put('panier',$panier);

        //dd(Session::get('panier'));
        return redirect::to('/single_product/{id}');
    }
    public function ajouter_au_panierMultipleProducts(Request $request,$id,$qty){
       // $url = $request->fullUrl();
        $accompagnement1Nom = $request->query('accompagnement1qs');
        $accompagnement2Nom = $request->query('accompagnement2qs');

           
        $produit = DB::table('produits')
                 ->where('id',$id)
                 ->first();

        $accompagnement1 = DB::table('produits')
                ->where('nom_produit',$accompagnement1Nom)
                ->first();
        $accompagnement1->prix = 0;
       
     
        $accompagnement2 = DB::table('produits')
                ->where('nom_produit',$accompagnement2Nom)
                ->first();
        $accompagnement2->prix = 0;

        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);
        $panier->add($produit,$id,$qty);
        $panier->add($accompagnement1,$accompagnement1->id,$qty);
        $panier->add($accompagnement2,$accompagnement2->id,$qty);

        Session::put('panier',$panier);

        Session::put('message','Votre produit '.$produit->nom_produit.' a été ajoutée au panier.');

        //dd(Session::get('panier'));
        return view('client.single_product')
            ->with(compact('produit'));
       

    }
    
}
