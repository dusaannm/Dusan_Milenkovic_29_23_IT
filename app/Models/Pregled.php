<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregled extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vozilo_id',
        'datum',
        'vreme',
    ];

    public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}


    public function vozilo()
{
    return $this->belongsTo(\App\Models\Vozilo::class);
}

}
