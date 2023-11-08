<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color1 extends Model
{
    use HasFactory;
    
    protected $table = 'colors1';

    public $timestamps = false; // Als de tabel geen timestamps heeft

    protected $fillable = ['color1']; // De kolommen die je kunt invullen

}
