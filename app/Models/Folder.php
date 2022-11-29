<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'folder_name'
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class, 'listing_id');
    }
}
