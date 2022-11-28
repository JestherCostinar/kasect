<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'file_name', 'file_path'];


    public function listings()
    {
        return $this->hasMany(Listing::class, 'listing_id');
    }

}
