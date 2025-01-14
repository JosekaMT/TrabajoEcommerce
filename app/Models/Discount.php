<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    //Relación uno a uno 
    public function product ()
    {
        return $this->belongsTo(Product::class);
    }
}
