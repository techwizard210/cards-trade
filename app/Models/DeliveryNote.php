<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryNote extends Model
{
    public $table = "delivery_notes";

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'order_id',
        'path',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
