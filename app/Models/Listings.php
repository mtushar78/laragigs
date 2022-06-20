<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['tags'] ?? false){
            $query->where('tags', 'like', '%'. $filters['tags'].'%');
        }
    }
}
