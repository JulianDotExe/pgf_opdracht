<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    public $timestamps = true;
    protected $fillable = [
        'event_date', 'event_name', 'beschrijving', 'locatie', 'link'
    ];

    public function catagories()
    {
        return $this->belongsTo(Category::class);
    }

}
