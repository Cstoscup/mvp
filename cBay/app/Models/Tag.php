<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'tag'];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
