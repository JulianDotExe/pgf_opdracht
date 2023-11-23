<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    use HasFactory;

    protected $table = 'sorts';

    public $timestamps = false; // Als de tabel geen timestamps heeft

    protected $fillable = ['sort_name']; // De kolommen die je kunt invullen

    public function overviews()
    {
        return $this->hasMany(Overview::class);
    }
    // Primaire sleutel (optioneel, Laravel zal aannemen dat het 'id' is als het niet wordt opgegeven)
    // protected $primaryKey = 'id';

}
