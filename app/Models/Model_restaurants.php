<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model_restaurants extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'restaurants';

    protected $fillable = [
        'master_restaurant_brand_id',
        'address',
        'master_city_state_id',
        'rating',
        'deal_amount',
        'deal_options',
        'bought_count'
    ];
}
