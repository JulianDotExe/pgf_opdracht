<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color2 extends Model
{
    use HasFactory;
    
    protected $table = 'colors2';

    public $timestamps = false; // Als de tabel geen timestamps heeft

    protected $fillable = ['color2']; // De kolommen die je kunt invullen

    public function overviews()
    {
        return $this->hasMany(Overview::class);
    }
}
