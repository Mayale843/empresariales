<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock', 'estado'];

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)->withPivot('quantity', 'price', 'estado');
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class)->withPivot('quantity', 'price', 'estado');
    }

    public function scopeActive($query)
    {
        return $query->where('estado', 1);
    }
}