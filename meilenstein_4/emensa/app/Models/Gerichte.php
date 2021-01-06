<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerichte extends Model
{
    protected $attributes=['gericht_id'];

    public function getPreisInternAttribute($value){
        return number_format($value,2);
    }
    public function getPreisExternAttribute($value){
        return number_format($value,2);
    }

    public function setVeganAttribute($value){
        $value = preg_replace('/\s*/', '', $value);
        $value = strtolower($value);

        if ($value == 'ja'){
            $this->attributes['vegan'] = 1;
        }
        else if ($value == 'nein'){
            $this->attributes['vegan'] = 0;
        }
        else if ($value == 'true'){
            $this->attributes['vegan'] = 1;
        }
        else if ($value == 'false'){
            $this->attributes['vegan'] = 0;
        }

    }

    public function setVegetarischAttribute($value){
        $value = preg_replace('/\s*/', '', $value);
        $value = strtolower($value);

        if ($value == 'ja'){
            $this->attributes['vegetarisch'] = 1;
        }
        else if ($value == 'nein'){
            $this->attributes['vegetarisch'] = 0;
        }
        else if ($value == 'true'){
            $this->attributes['vegetarisch'] = 1;
        }
        else if ($value == 'false') {
            $this->attributes['vegetarisch'] = 0;
        }

    }

    use HasFactory;
}
