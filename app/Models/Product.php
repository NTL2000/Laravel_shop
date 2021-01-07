<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ="products";
    public function bill_detail(){
    	return $this->belongsTo("App\Models\BillDetail","id_product","id");
    }
    public function product_type(){
    	return $this->belongsTo("App\Models\ProductType","id_type","id");
    }
}
