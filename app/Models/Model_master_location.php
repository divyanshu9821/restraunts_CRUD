<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model_master_location extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'master_location';

    protected $fillable = [
        'city',
        'state'
    ];
}
