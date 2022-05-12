<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "user_id",
        "logo",
        "tags",
        "company",
        "location",
        "email",
        "website",
        "description",
    ];

    public function scopeFilter($query, array $filters)
    {
        //Tags Functionality
        if ($filters["tag"] ?? false) {
            $query->where("tags", "Like", "%" . request("tag") . "%");
        }
        //Search Functionality
        if ($filters["search"] ?? false) {
            $query
                ->where("title", "Like", "%" . request("search") . "%")
                ->orWhere("description", "Like", "%" . request("search") . "%")
                ->orWhere("tags", "Like", "%" . request("search") . "%");
        }
        //Sorting Functionality
        if ($filters["order"] ?? false) {
            if ($filters["order"] === "latest") {
                $query
                    ->select("*")
                    ->orderBy("updated_at", 'DESC')
                    ->get();
            } elseif ($filters["order"] === "oldest") {
                $query
                    ->select("*")
                    ->orderBy("updated_at", 'ASC')
                    ->get();
            }
        }
    }

    //Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
