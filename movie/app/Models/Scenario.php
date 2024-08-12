<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function actor()
    {
        return $this->hasOne(Actor::class);
    }
}
