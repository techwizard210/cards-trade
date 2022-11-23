<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offers extends Model {
    use HasFactory;

    protected $fillable = [
        'card',
        'gateway',
        'username',
        'price',
        'isActive'
    ];

    public function orderlist() {
        return $this->belongsTo( OrderList::class, 'offer_id' );
    }

    public $timestamps = false;
}
