<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'event_id';
    public $timestamps = true;
    protected $fillable = [
        'event_date', 'categories_id', 'event_name', 'beschrijving', 'locatie', 'link'
    ];

    public function categories()
    {
        return $this->belongsTo(Categorie::class, 'categories_id', 'id');
    }

    public function category()
    {
        return Categorie::find($this->categories_id);
    }

}
