<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'artikel_id'; // specify the primary key
    public $timestamps = true;
    protected $fillable = [
        'titel', 'categories_id', 'inhoud', 'link', 'auteur'
    ];

}
