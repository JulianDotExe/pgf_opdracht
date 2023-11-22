<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = [
        'category_name'
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'categories_id', 'id');
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

}
