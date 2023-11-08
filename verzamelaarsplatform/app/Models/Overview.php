<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalogusnr',
        'nummer',
        'eigenschappen',
        'bijzonderheden',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

