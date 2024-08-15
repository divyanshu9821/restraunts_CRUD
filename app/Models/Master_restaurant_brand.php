<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_restaurant_brand extends Model
{
    use HasFactory;

    protected $table = 'master_restaurant_brand';

    protected $fillable = [
        'name',
        'logo'
    ];
}
