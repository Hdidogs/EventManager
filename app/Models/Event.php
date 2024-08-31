<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'date',
        'nombre_de_places',
        'organisateur_id',
    ];

    public function organisateur()
    {
        return $this->belongsTo(User::class, 'organisateur_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
