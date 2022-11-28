<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;

    public function listings()
    {
        return $this->hasMany(Listing::class, 'listing_id');
    }

}
