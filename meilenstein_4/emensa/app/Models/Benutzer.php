<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benutzer extends Model
{
    use HasFactory;

    protected $casts=[
        'admin' => 'boolean',

    ];

    public function bewertungen(){
        return $this->hasMany(Bewertung::class,'benutzer_id');
    }
}
