<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{   

     function __construct()
    {
       
        $this->middleware('permission:Utilisateurs-éditer', ['only' => ['edit_categorie','modifier_categorie']]);
        $this->middleware('permission:Utilisateurs-supprimer', ['only' => ['supprimer_categorie']]);
    }

    public function sauver_category(Request $request){
        $data = array();
        $data['nom']= $request->name;

        DB::table('categories')
            ->insert($data);
        
        Session::put('message','Catégorie ajoutée avec succès');

        return redirect::to('/admin/ajoutercategorie');
    }

    public function edit_categorie($id){
        $categories =  DB::table('categories')
                    ->where('id',$id)
                    ->first();

        $manage_categories = view('admin.edit_categorie')
                    ->with('categories', $categories);


        return view('layouts.appadmin')
                    ->with('admin.edit_categorie',$manage_categories);

    }

    public function modifier_categorie(Request $request){
        $data = array();
        $data['nom']= $request->name;

        //MAJ nom de la categorie enregistré dans produit
        $data1 = array();
        $data1['categorie']= $request->name;

        $ancienne_cat = DB::table('categories')
                ->where('id',$request->id)
                ->first();

        DB::table('produits')
            ->where('categorie',$ancienne_cat->nom)
            ->update($data1);

        //MAJ nom de la categorie enregistré dans sous-categorie
        $data2 =array();   
        $data2['categorie']= $request->name;   

        $ancienne_subcat = DB::table('categories')
                ->where('id',$request->id)
                ->first();

        DB::table('subcategories')
                ->where('categorie',$ancienne_subcat->nom)
                ->update($data2);


        DB::table('categories')
            ->where('id',$request->id)
            ->update($data);

        Session::put('message','Catégorie modifiée avec succès');

        return redirect::to('/admin/categories');

    }

    public function supprimer_categorie($id){
        DB::table('categories')
        ->where('id',$id)
        ->delete();

        Session::put('message','Catégorie supprimée avec succès');

        return redirect::to('/admin/categories');
    }
}
