<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sort_id',
        'brand_id',
        'catalogusnr',
        'epoche_id',
        'nummer',
        'eigenschappen',
        'owner_id',
        'color1_id',
        'color2_id',
        'bijzonderheden',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

