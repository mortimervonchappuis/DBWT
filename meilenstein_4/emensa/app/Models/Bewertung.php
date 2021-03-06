<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bewertung extends Model
{
    use HasFactory;

    public function benutzer(){
        return $this->belongsTo(Benutzer::class);
    }
    public function gericht(){
        return $this->belongsTo(Gerichte::class);
    }
}
