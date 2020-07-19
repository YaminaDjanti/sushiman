<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Panier;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function voir_pdf($id){
        Session::put('id',$id);
        try{
            $pdf = \App::make('dompdf.wrapper')->setPaper('a4','landscape');
            $pdf->loadHTML($this->convert_commandes_data_to_html());
            return $pdf->stream();
        }
        catch(\ Exception $e){
            return redirect::to('/commandes')->with('error',$e->getMessage());
        }
    }
    public function convert_commandes_data_to_html(){
        $commandes = DB::table('commandes')
            ->where('id',Session::get('id'))
            ->get();

        // $noms = $commandes->nom ;
        // $adresse = $commandes->adresse;
        // $date = $commandes->date;
        $nom;
        $adresse;
        $date;
        $totalPrice;


        foreach($commandes as $commande){
            $noms = $commande->nom;
            $adresse = $commande->adresse;
            $date = $commande->date;
        }

        $commandes->transform(function($commande,$key){
            $commande->panier = unserialize($commande->panier);
            return $commande;
        });

      

        $output =  
        '<link rel="stylesheet" href="frontend/css/style.css">
            <table class="table">
                <thead class="thead">
                    <tr class="text-left">
                        <th>Clients Noms : '.$noms.'<br> 
                        Adresse du client : '.$adresse.'<br>
                        Date : '.$date.' </th>
                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center">
                      <th>Image</th>
                      <th>Nom du produit</th>
                      <th>Prix</th>
                      <th>Quantité</th>
                      <th>Pix total</th>
                  </tr>
                </thead>
            <tbody>';

            foreach($commandes as $commande){
                foreach($commande->panier->items as $item){
                    
                    $output .= 
                        ' <tr class="text-center">
                            <td class="image-prod">
                                <img src="storage/cover_images/'.$item['product_image'].'" alt="image du produit"
                                style="height: 80px; width: 80px;">
                            </td>
                            <td class="product-name">
                                <h3>'.$item['product_name'].'</h3>
                            </td>
                            <td class="price">'.$item['product_price'].' €</td>
                            <td class="qty">'.$item['qty'].'</td>
                            <td class="total">'.$item['product_price']*$item['qty'].'</td>
                            </tr><!-- END TR-->
                        </tbody>';

                }
                $totalPrice = $commande->panier->totalPrice;
            }


            $output .='</table>'; 
        
            $output = 
            ' <table class="table">
                <thead class="thead">
                    <tr class="text-center">
                        <th>Prix total</th>
                        <th>'.$totalPrice.' €</th>
                    </tr>
                </thead>
            </table>';

            return $output;


    }

}




    