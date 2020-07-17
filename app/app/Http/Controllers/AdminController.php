<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:Produit-liste', ['only' => ['produits']]);
        $this->middleware('permission:Produit-créer', ['only' => ['ajouterproduit']]);
     
        $this->middleware('permission:Slider-liste', ['only' => ['sliders']]);
        $this->middleware('permission:Slider-créer', ['only' => ['ajouterslider']]);

        $this->middleware('permission:Catégorie-liste', ['only' => ['categories']]);

        $this->middleware('permission:Allergène-liste', ['only' => ['allergenes']]);
        $this->middleware('permission:Allergène-créer', ['only' => ['ajouterallergene']]);

    }

    // public function __construct()
    // {
    //     // $this->middleware('auth');
    //     // $this->middleware('admin');
    // }
    
  /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    
    */
    
    public function index()
    
     {
         return view('admin.tableau_de_bord');
     }


    public function admin(){
        return view('admin.tableau_de_bord');
        
    }
    public function ajoutercategorie(){
        return view('admin.ajouter_categorie');
        
    }
   
    public function ajouterproduit(){
        $permission = Permission::get();
        return view('admin.ajouter_produit',compact('permission'));
        
    }
    public function ajouterslider(){
        $permission = Permission::get();
        return view('admin.ajouter_slider',compact('permission'));
        
    }
    public function ajouterallergene(){
        $permission = Permission::get();
        return view('admin.ajouter_allergene',compact('permission'));
        
    }
    public function categories(){
        $permission = Permission::get();
        return view('admin.categories',compact('permission'));
        
    }
    public function sous_categories(){
        return view('admin.sous_categories');
        
    }
    public function produits(){
        $permission = Permission::get();
        return view('admin.produits',compact('permission'));
        
    }
    public function sliders(){
        $permission = Permission::get();
        return view('admin.sliders',compact('permission'));
        
    }
    public function commandes(){
        return view('admin.commandes');
        
    }
    public function allergenes(){
        $permission = Permission::get();
        return view('admin.allergenes',compact('permission'));
        
    }
}
