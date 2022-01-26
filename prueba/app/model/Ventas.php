<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $fillable = ['product_id','quantity_sale'];

    public function saveData($data){
        $this->product_id    = $data['id'];
        $this->quantity_sale = $data['cantidad-solicitada'];
        $this->save();
    }

    public function list(){
       return $this->query()->join('productos','productos.id','=','ventas.product_id')
              ->orderBy('ventas.created_at')           
              ->get();
    }
}
