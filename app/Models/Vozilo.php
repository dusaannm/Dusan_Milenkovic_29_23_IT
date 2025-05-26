<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vozilo extends Model
{
    protected $fillable = [
    'marka',
    'model',
    'godiste',
    'registracija',
    'vlasnik',
    'featured',
];

public function pregledi()
{
    return $this->hasMany(Pregled::class);
}
}

