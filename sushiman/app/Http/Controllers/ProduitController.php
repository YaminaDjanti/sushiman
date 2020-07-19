<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Panier;
use Illuminate\Support\Facades\View;
use App\Http\Requests\PaiementRequest;
use Stripe\Stripe;
use Stripe\Charge;

class ProduitController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Produit-éditer', ['only' => ['edit_produit','modifier_produit']]);
        $this->middleware('permission:Produit-supprimer', ['only' => ['supprimer_produit']]);
        $this->middleware('permission:Produit-Statut', ['only' => ['desactiver_produit','activer_produit']]);
    }


    public function sauver_produit(ProductRequest $request){
        
            //dd(getcwd());
        if($request->category == "Sélectionnez une Catégorie"){
            Session::put('message1', 'Veuillez sélectionner la catégorie');
            return redirect::to('/admin/ajouterproduit');
        }else
            {
                // $this->validate($request, [
                //     'product_image'=>'image|nullable|max:1999',
                //     'name'=>'required|min:3',
                //     'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                // ]);

                if($request->hasFile('product_image'))
                
                {
                    //1 : Donner le nom du fichier avec l'extension
                    $filenameWithExt = $request->file('product_image')                      ->getClientOriginalName();

                    //2 : donner le nom du fichier uniquement
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                    //3 : Donner uniquement l'extension
                    $extension = $request->file('product_image')
                    ->getClientOriginalExtension();

                    //4 : file name to store nom du fichier
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;

                    //5 : path
                    $path = $request->file('product_image')->storeAs('public/cover_images', $fileNameToStore);
                    //dd($filenameWithExt,$filename,$extension,$fileNameToStore,$path);
                    
                } 
                                
                else 
                    {
                        $fileNameToStore = 'noimage.jpg';
                    }
                
            }
            $data1 = array();
            if($request->product_status){
                $data = array();
                // nous affectons toutes nos allergenes cochées à $allergenes 
                $allergenes=$request->product_status;
    
                /* nous chargeons toutes nos catégories dans 
                    la variable tableau $data à chaque itération */
 
                for($i = 0; $i < count($allergenes); $i++){
                    $data[$i] = $allergenes[$i];
                }
 
                /* conversion d'une variable du type 
                tableau ($data) à un string  $allergene_a_inserer */
                $allergene_a_inserer = implode(',', $data);

                if( $allergene_a_inserer){
                    $data1['allergenes'] = $allergene_a_inserer;
                }

                // if(empty($data['allergenes'])){
                //     $data['allergenes'] = '';
                // }else{
                //     $data1['allergenes'] = $allergene_a_inserer;
                // }
                
            }
          
                $data1['nom_produit'] = $request->name;
                $data1['prix'] = $request->price;
                $data1['categorie'] = $request->category;
                $data1['product_image'] = $fileNameToStore;
                $data1['description_produit'] = $request->description_produit;
                $data1['status'] = $request->status;
            
                //print_r($data1);
                DB::table('produits')
                    ->insert($data1);
                    $fileImage = fopen('storage/cover_images/'.$fileNameToStore,'w');

                    //file_get_contents()

                    fwrite($fileImage,file_get_contents($request->file('product_image')));

                    //Storage::disk('local')->put($fileNameToStore,$request->file('product_image'));

                    Session::put('message','produit ajouté avec succès');
                    return redirect::to('/admin/ajouterproduit');
           
        
    }


    public function select_by_cat($nom_produit){

        $produits = DB::table('produits')
            ->where('categorie', $nom_produit)
            ->paginate(5);
            
       $manager_produits = view('client.shop')
            ->with('produits',$produits);


        $anchor = 'produitsList';
        
        
            //dd($manager_produits);
            
            return view('layouts.app')
                 ->with('client.shop',$manager_produits);      

    }

    public function activer_produit($id){
        $data = array();
        $data['status'] = 1;

        DB::table('produits')
            ->where('id',$id)
            ->update($data);

        Session::put('message','produit activé avec succès');
        return redirect::to('/admin/produits');
    }

    public function desactiver_produit($id){
        $data = array();
        $data['status'] = 0;

        DB::table('produits')
            ->where('id',$id)
            ->update($data);

        Session::put('message','produit désactivé avec succès');
        return redirect::to('/admin/produits');
    }

    public function edit_produit($id){
        $produits =  DB::table('produits')
                    ->where('id',$id)
                    ->first();
        
        Session::put('id',$id);

        $manage_produits = view('admin.edit_produit')
                    ->with('produits', $produits);


        return view('layouts.appadmin')
                    ->with('admin.edit_produit',$manage_produits);

    }
    public function modifier_produit(Request $request){
       
        $this->validate($request, [
            'product_image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('product_image'))
        {

            //1 : Donner le nom du fichier avec l'extension
            $filenameWithExt = $request->file('product_image')
            ->getClientOriginalName();

            //2 : donner le nom du fichier uniquement
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //3 : Donner uniquement l'extension
            $extension = $request->file('product_image')
            ->getClientOriginalExtension();

            //4 : file name to store nom du fichier
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //5 : path
            $path = $request->file('product_image')->storeAs('public/cover_images', $fileNameToStore);
        } else 
            {
                $fileNameToStore = 'noimage.jpg';
            }

            //if($request->product_status){
               // $data = array();
                // nous affectons toutes nos allergenes cochées à $allergenes 
               // $allergenes=$request->product_status;
    
                /* nous chargeons toutes nos catégories dans 
                    la variable tableau $data à chaque itération */
               // for($i = 0; $i < count($allergenes); $i++){
                //    $data[$i] = $allergenes[$i];
                //}
 
                /* conversion d'une variable du type 
                tableau ($data) à un string  $allergene_a_inserer */
 
                //$allergene_a_inserer = implode(',', $data);
            //}
            
            //$data['product_image'] = $fileNameToStore;
            
            $data = array();
            $data['nom_produit'] = $request->name;
            $data['prix'] = $request->price;
            $data['categorie'] = $request->category;
            $data['description_produit'] = $request->description_produit;
            //$data['allergenes'] = $request->$allergene_a_inserer;

            if($request->hasFile('product_image')){
                $produits = DB::table('produits')
                    ->where('id', Session::get('id'))
                    ->first();
                $data['product_image'] = $fileNameToStore;

                if($produits->product_image !='noimage.jpg'){
                    Storage::delete('public/cover_images'.$produits->product_image);

                }
            }
     
            DB::table('produits')
            ->where('id',Session::get('id'))
            ->update($data);
     
            Session::put('message','produit modifié avec succès');
            return redirect::to('/admin/produits');
    

    }

    public function supprimer_produit($id){
        $select_image = DB::table('produits')
                        ->where('id',$id)
                        ->first();

        if ($select_image->product_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$select_image->product_image);
            }

        DB::table('produits')
        ->where('id',$id)
        ->delete();

        Session::put('message','Produit supprimé avec succès');
        return redirect::to('/admin/produits');
    }

    public function ajouter_au_panier($id){
        $produit = DB::table('produits')
                ->where('id',$id)
                ->first();
        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);
        $panier->add($produit,$id);
        Session::put('panier',$panier);

        Session::put('message','Votre produit '.$produit->nom_produit.' a été ajoutée au panier');
        return redirect::to('/');

    }
    public function ajouter_au_panierPageCarte($id){
        $produit = DB::table('produits')
                ->where('id',$id)
                ->first();
        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);
        $panier->add($produit,$id);
        Session::put('panier',$panier);

        Session::put('message','Votre produit '.$produit->nom_produit.' a été ajoutée au panier');

    
        return redirect::to('/shop');

    }
 
    public function ajouter_au_panierPagePanier($id){

        $produit = DB::table('produits')
                ->where('id',$id)
                ->first();

        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);
        $panier->add($produit,$id);
        Session::put('panier',$panier);


        return redirect::to('/panier');

    }
    public function panier()
    {
        if(!Session::has('panier')){

            return view('client.panier');

        }
        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);

        return view('client.panier', ['produits' => $panier->items]);
        
    }

    public function modifierQty(Request $request){
        //print('qty'.$request->quantity.'id'.$request->id);
        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);
        $panier->modifierQty($request->quantity,$request->id);
        Session::put('panier',$panier);
 
        return redirect::to('/panier');
    }
    

    public function enlever_item($id){
        $oldCart = Session::has('panier')?Session::get('panier'):null;
        $panier = new Panier($oldCart);
        $panier->enlever_item($id);

        if (count($panier->items)>0) {
            Session::put('panier',$panier);
        }else{
            Session::forget('panier');

        }

        return redirect::to('/panier');
        
    }
    public function paiement(){
        if(!Session::has('panier')){
            return redirect::to('/panier');
        }
        
        return view('client.paiement');
       }

    public function payer(Request $request){
        if(!Session::has('panier')){
            return redirect::to('/panier');
            //si panier vide
        }
        $this->validate($request, [
            
             'prenom'=>'required|string|min:3',
             'nom'=>'required|string|min:3',
             'email'=>'required|email',
             'adressepostale'=>'required|min:5',
             'codePostal'=>'required|numeric|min:5',
             'ville'=>'required|min:3',
             'boutonLivraison'=>'sometimes',
             'adresseLivraison'=>'required_if:boutonLivraison,on|min:3',
             'codePostalDeLivraison'=>'required_if:boutonLivraison,on|numeric|min:2',
             'villeDeLivraison'=>'required_if:boutonLivraison,on|string',
             'telephone' => 'required_if:boutonLivraison,on|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
             'textMessage' => 'max:350',

          ]);

        $oldCart = Session::get('panier');
        $panier = new Panier($oldCart);

     

        Stripe::setApiKey('sk_test_51Gqb2DG4vtl0CqE0vYvkRjtSSDWtiaTA8JJd6SjMEhyMfN6DnoYdwsAf82qjyRtORBWQtu9taTSa2bT0XBPHUGb800BDWjhX8Q');
        Stripe::setVerifySslCerts(false);
        try{
            $charge = Charge::create(array(
                "amount" => $panier->totalPrice *100,
                "currency" => "EUR",
                "source" => $request->input('stripeToken'),//provenant de script.js
                "description" => "Test Charge"
            ));
            $data = array();
            $data['nom']= $request ->nom;
            $data['adresse']= $request ->adresse;
            $data['panier']= serialize($panier);
            $data['paiement_id']= $charge ->id;

            DB::table('commandes')
                ->insert($data);

        } catch (\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect::to('/paiement');

        }

        Session::forget('panier');
        Session::put('success', 'Achat effectué avec succès!');
        return redirect::to("/panier");
        


    }

    public function commandes(){
        return view('admin.commandes');
    }


}
