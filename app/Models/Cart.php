<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=['product_id'];
    public function product(){
        return $this->belongsTo(Product::class);
    } 
    public function totalPrice($price,$quantity){
        $total=$price*$quantity;
        return $total;
    }
    public function endprice(){
        $total=0;
        for($i=0;$i<$this->count();$i++){
            $total+=$this->product->price*$this->quantity;
        }
        return $this->belongsTo(Product::class)->$total;
    }
}
