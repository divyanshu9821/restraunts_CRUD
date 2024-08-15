<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    use HasFactory;

    protected $table = 'restaurants';

    protected $fillable = [
        'master_restaurant_brand_id',
        'address',
        'master_city_state_id',
        'rating',
        'deal_amount',
        'deal_options',
        'bought_count',
    ];
}
