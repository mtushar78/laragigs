<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class Listings extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
//        dd(trim(strtolower($filters['search'])));

        if($filters['tags'] ?? false){
            $query->where('tags', 'like', '%'. $filters['tags'].'%');
        }

        if($filters['search'] ?? false){
            $filters['search'] = trim(strtolower($filters['search']));

            $query->where(\DB::raw('lower(title)'), 'like', '%'. $filters['search'].'%')
            ->orWhere(\DB::raw('lower(tags)'), 'like', '%'. $filters['search'].'%')
            ->orWhere(\DB::raw('lower(description)'), 'like', '%'. $filters['search'] .'%')
            ->orWhere(\DB::raw('lower(company)'), 'like', '%'. $filters['search'] .'%');

        }
    }
}
