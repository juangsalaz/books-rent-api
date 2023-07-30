<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function checkout(): MorphToMany
    {
        return $this->morphToMany(Checkout::class, 'checkout');
    }
}
