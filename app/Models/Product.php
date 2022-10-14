<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public function merchant() {
        return $this->belongsTo(Merchant::class,'merchant_id');
    }
}
