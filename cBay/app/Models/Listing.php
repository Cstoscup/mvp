<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'city', 'state', 'email', 'phone', 'price'];

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }

    public function tag()
    {
        return $this->hasMany(Tag::class);
    }

    public function scopeFilter($query, array $filters) {
        if ($filters['tag'] ?? false) {
            $query->whereRelation('tag', 'tag', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->whereRelation('tag', 'tag', 'like', '%' . request('search') . '%')
                  ->whereRelation('tag', 'tag', 'like', '%' . request('search') . '%')
                  ->orWhere('title', 'like', '%' . request('search') . '%')
                  ->orWhere('description', 'like', '%' . request('search') . '%')
                  ->orWhere('city', 'like', '%' . request('search') . '%')
                  ->orWhere('state', 'like', '%' . request('search') . '%');
        }
    }
}