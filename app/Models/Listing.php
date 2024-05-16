<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'email', 'tags', 'description'];

    public function scopeFilters($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tag', 'like', '%' . request('tag') . '%');
        }
    }


    //relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
