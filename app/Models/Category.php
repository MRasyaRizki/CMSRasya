<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post; 

class Category extends Model
{
    protected $guarded = [];

    public function post(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}
