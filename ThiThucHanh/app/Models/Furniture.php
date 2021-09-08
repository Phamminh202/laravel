<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;
    protected $table='furniture';
    protected $fillable=[
        'product_code','name','price','avatar'
    ];
}
