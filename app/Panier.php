<?php
namespace App;
use Illuminate\Http\Request;

class Panier{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($ancientPannier)
    {
        if($ancientPannier){
            $this->items = $ancientPannier->items;
            $this->totalQty = $ancientPannier->totalQty;
            $this->totalPrice = $ancientPannier->totalPrice;
        }
    }

    public function add($item, $id){

        $storedItem = ['qty' => 0, 'prix' => $item->prix, 'item' => $item];

        if($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['prix'] = $item->prix * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->prix;
    }
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['prix']-= $this->items[$id]['item']['prix'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['prix'];

        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

}
