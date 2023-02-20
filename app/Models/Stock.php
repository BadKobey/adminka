<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock', 'stock_id');
    }
}
