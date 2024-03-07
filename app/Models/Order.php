<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalog_id',
        'user_id',
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
}
