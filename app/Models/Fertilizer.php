<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fertilizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'usage_instruction',
        'image_url',
        'purchase_link',
    ];

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'disease_fertilizer');
    }
}
