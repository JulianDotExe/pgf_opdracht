<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epoche extends Model
{
    use HasFactory;
    
    protected $table = 'epoches';

    public $timestamps = false; // Als de tabel geen timestamps heeft

    protected $fillable = ['epoche_name']; // De kolommen die je kunt invullen

    public function overviews()
    {
        return $this->hasMany(Overview::class);
    }

}
