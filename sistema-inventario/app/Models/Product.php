<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'code', 'name', 'description', 'price', 'quantity', 
    'category', 'supplier', 'expiration_date', 'image', 'active'
];

    protected $casts = [
        'expiration_date' => 'date',
        'active' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}