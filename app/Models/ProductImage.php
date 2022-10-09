<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ProductImage extends Model
{
    protected $fillable = ['url','product_id','status'];
}
