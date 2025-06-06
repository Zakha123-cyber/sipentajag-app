<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'symptoms',
        'treatment',
    ];

    public function scans()
    {
        return $this->hasMany(Scan::class);
    }

    public function fertilizers()
    {
        return $this->belongsToMany(Fertilizer::class, 'disease_fertilizer');
    }
}
