<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'checkout');
    }
 
    public function books(): MorphToMany
    {
        return $this->morphedByMany(Book::class, 'checkout');
    }
}
