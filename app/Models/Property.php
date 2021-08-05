<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'location',
        'operationType',
        'type',
        'rooms',
        'baths',
        'agencyID'
    ];

    protected $casts = [
        'location' => 'array'
    ];
}
