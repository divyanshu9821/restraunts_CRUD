<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_location extends Model
{
    use HasFactory;

    protected $table = 'master_location';

    protected $fillable = [
        'city',
        'state'
    ];
}
