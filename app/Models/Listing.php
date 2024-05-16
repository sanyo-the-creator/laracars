<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'email', 'tags', 'description'];

    public function scopeFilters($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tag', 'like', '%' . request('tag') . '%');
        }
    }
}
