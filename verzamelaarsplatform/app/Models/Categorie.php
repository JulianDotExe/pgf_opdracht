<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    
    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = [
        'category_name'
    ];

    
    public function news()
    {
        return $this->hasMany(News::class, 'categories_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'categories_id');
    }
}
