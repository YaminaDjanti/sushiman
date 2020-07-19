<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllergeneRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AllergeneController extends Controller
{   

    function __construct()
    {
        $this->middleware('permission:Allergène-éditer', ['only' => ['modifier_allergene']]);
        $this->middleware('permission:Allergène-supprimer', ['only' => ['supprimer_allergene']]);
    }

    public function sauver_allergene(AllergeneRequest $request){

         //$this->validate($request, [
         //   'nom'=>'required|min:3',
         //]);

        $data = array();
        $data['nom']= $request->name;

        DB::table('allergenes')
            ->insert($data);
        
        Session::put('message','Allergene ajoutée avec succès');
        return redirect::to('/admin/ajouterallergene');
    }

    public function modifier_allergene(Request $request){
        $data = array();
        $data['nom']= $request->name;

        $data1 = array();
        $data1['allergene']= $request->name;

        $ancien_allergene = DB::table('allergenes')
                ->where('id',$request->id)
                ->first();

        DB::table('produits')
            ->where('allergene',$ancien_allergene->nom)
            ->update($data1);

        DB::table('allergenes')
            ->where('id',$request->id)
            ->update($data);

        Session::put('message','Allergene modifié avec succès');

        return redirect::to('/admin/allergenes');

    }

    public function supprimer_allergene($id){
        DB::table('allergenes')
        ->where('id',$id)
        ->delete();

        Session::put('message','Allergene supprimé avec succès');

        return redirect::to('/admin/allergenes');
    }
}
