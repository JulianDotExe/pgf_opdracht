<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    public $timestamps = true;
    protected $fillable = [
        'titel', 'categories_id', 'inhoud', 'link', 'auteur'
    ];

    public function catagories()
    {
        return $this->belongsTo(Categorie::class);
    }
}
