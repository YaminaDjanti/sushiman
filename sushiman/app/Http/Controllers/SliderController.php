<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('permission:Slider-éditer', ['only' => ['edit_slider','modifier_slider']]);
        $this->middleware('permission:Slider-supprimer', ['only' => ['supprimer_slider']]);
        $this->middleware('permission:Slider-Statut', ['only' => ['activer_slider','desactiver_slider']]);
    }

    public function sauver_slider(Request $request){
        

        
        $this->validate($request, [
            'slider_image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('slider_image'))
        {

            //1 : Donner le nom du fichier avec l'extension
            $filenameWithExt = $request->file('slider_image')
            ->getClientOriginalName();

            //2 : donner le nom du fichier uniquement
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //3 : Donner uniquement l'extension
            $extension = $request->file('slider_image')
            ->getClientOriginalExtension();

            //4 : file name to store nom du fichier

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //5 : path

            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
        } else 
            {
                $fileNameToStore = 'noimage.jpg';
            }

        $data = array();
        $data['description1'] = $request->description1;
        $data['description2'] = $request->description2;
        $data['slider_image'] = $fileNameToStore;
        $data['status'] = $request->status;
     
        DB::table('sliders')
            ->insert($data);

            $fileImage = fopen('storage/slider_images/'.$fileNameToStore,'w');
                    //file_get_contents()
            fwrite($fileImage,file_get_contents($request->file('slider_image')));

     
        Session::put('message','slider ajouté avec succès');
        return redirect::to('/admin/ajouterslider');
        

    }

    public function activer_slider($id){
        $data = array();
        $data['status'] = 1;
     
        DB::table('sliders')
            ->where('id',$id)
            ->update($data);
     
        Session::put('message','slider activé avec succès');
        return redirect::to('/admin/sliders');
    }

    public function desactiver_slider($id){
        $data = array();
        $data['status'] = 0;
     
        DB::table('sliders')
            ->where('id',$id)
            ->update($data);
     
        Session::put('message','slider désactivé avec succès');
        return redirect::to('/admin/sliders');
    }

    public function edit_slider($id){
        $sliders =  DB::table('sliders')
                    ->where('id',$id)
                    ->first();
        
        Session::put('id',$id);

        $manage_sliders = view('admin.edit_slider')
                    ->with('sliders', $sliders);


        return view('layouts.appadmin')
                    ->with('admin.edit_slider',$manage_sliders);

    }
    public function modifier_slider(Request $request){
       
        $this->validate($request, [
            'slider_image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('slider_image'))
        {

            //1 : Donner le nom du fichier avec l'extension
            $filenameWithExt = $request->file('slider_image')
            ->getClientOriginalName();

            //2 : donner le nom du fichier uniquement
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //3 : Donner uniquement l'extension
            $extension = $request->file('slider_image')
            ->getClientOriginalExtension();

            //4 : file name to store nom du fichier

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //5 : path

            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
        } else 
            {
                $fileNameToStore = 'noimage.jpg';
            }

            $data = array();
            $data['description1'] = $request->description1;
            $data['description2'] = $request->description2;
             


            if($request->hasFile('slider_image')){
                $sliders = DB::table('sliders')
                            ->where('id', Session::get('id'))
                            ->first();
                $data['slider_image'] = $fileNameToStore;

                if($sliders->slider_image !='noimage.jpg'){
                    Storage::delete('public/slider_images'.$sliders->slider_image);

                }
            }
     
            DB::table('sliders')
            ->where('id',Session::get('id'))
            ->update($data);
     
            Session::put('message','Image de couverture modifiée avec succès');
            return redirect::to('/admin/sliders');
    

    }

    public function supprimer_slider($id){
        $select_image = DB::table('sliders')
                        ->where('id',$id)
                        ->first();

                        if ($select_image->slider_image != 'noimage.jpg'){
                            Storage::delete('public/slider_images/'.$select_image->slider_image);
                        }

        DB::table('sliders')
        ->where('id',$id)
        ->delete();

        Session::put('message','Slider supprimé avec succès');

        return redirect::to('/admin/sliders');
    }

    
}

