<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $table = 'cards';

    public function user() {
        return $this->belongsTo(User::class, 'card_user');
    }
    public function merchant() {
        return $this->belongsTo(Merchant::class,'merchant_id');
    }
}
