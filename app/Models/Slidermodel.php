<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slidermodel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'decription',
        'image',
        
       
    ];
}
