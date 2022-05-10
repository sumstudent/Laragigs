<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    //Add Tag descripton
    protected $fillable = [
        'tag_id',
        'tag_name',
    ];

    //Relationship to listing
    public function listing(){
        return $this->belongsTo(Listing::class, 'tag_id');
    }
}
