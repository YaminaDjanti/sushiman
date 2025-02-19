<?php

namespace App;



class Panier
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;   
    
    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            //dd($oldCart);
        }
        

    }
    
    public function add($item, $product_id,$qty=1){
        $storedItem = ['qty'=>0, 
                    'product_id' =>0, 
                        'product_name' =>$item->nom_produit,
                        'product_price' =>$item->prix,
                        'product_image' =>$item->product_image,
                        'item'=>$item ];


        // $currentProductPrice = $storedItem['product_price'];
        // if($currentProductPrice === 0){
        //     $storedItem['product_id']+=100;
        // } else{
        //     $storedItem['product_id']= $product_id;
        // }
        //dd($this->items[$product_id], $product_id, $item->prix);
        //dd($currentProductPrice !== 0);
        if($this->items){
            if(array_key_exists($product_id,$this->items)){
                $storedItem = $this->items[$product_id];

            }
        }
        
        $storedItem['qty']=$storedItem['qty']+$qty;
        $storedItem['product_id']= $product_id;
        $storedItem['product_name']= $item->nom_produit;
        $storedItem['product_price']= $item->prix;
        $storedItem['product_image']= $item->product_image;

        $this->totalQty++;
        //dd($this->totalPrice,$storedItem );
        $this->totalPrice += $item->prix*$qty;
        $this->items[$product_id] = $storedItem;
    }
    

    public function modifierQty($qty,$id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price']*$this->items[$id]['qty'];
        
        $this->items[$id]['qty'] = $qty;
        $this->totalQty +=$qty;
        $this->totalPrice += $this->items[$id]['product_price']*$qty;

    }

    public function enlever_item($id){
        
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price']*$this->items[$id]['qty'];
        unset($this->items[$id]);
    }


  

}
?>
