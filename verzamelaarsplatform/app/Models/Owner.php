<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    
    protected $table = 'owners';

    public $timestamps = false; // Als de tabel geen timestamps heeft

    protected $fillable = ['owner_name']; // De kolommen die je kunt invullen

}
