<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    protected $table = 'brands';

    public $timestamps = false; // Als de tabel geen timestamps heeft

    protected $fillable = ['brand_name']; // De kolommen die je kunt invullen

    public function overviews()
    {
        return $this->hasMany(Overview::class);
    }
}
