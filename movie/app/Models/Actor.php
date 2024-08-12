<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'scenario_id'];

    public function scenario()
    {
        return $this->belongsTo(Scenario::class);
    }
}
