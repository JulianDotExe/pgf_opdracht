<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'artikel_id'; // specify the primary key
    public $timestamps = true;
    protected $fillable = [
        'titel', 'categories_id', 'inhoud', 'link', 'auteur'
    ];

    public function categories()
    {
        return $this->belongsTo(Categorie::class, 'category_id', 'id');
    }

    public function category()
    {
        return Categorie::find($this->categories_id);
    }
}
