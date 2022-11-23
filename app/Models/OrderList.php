<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model {
    use HasFactory;
    protected $table = 'order_list';
    // public $timestamps = false;

    // public function offer() {
    //     return $this->hasOne( offers::class, 'id', 'offer_id' );
    // }

    public function offer() {
        return $this->belongsTo( offers::class );
    }
}
