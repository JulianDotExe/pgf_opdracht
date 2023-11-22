<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;

    public $timestamps = true;

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
    
    public function color1()
    {
        return $this->belongsTo(Color1::class, 'color1_id');
    }

    public function color2()
    {
        return $this->belongsTo(Color2::class, 'color2_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sort()
    {
        return $this->belongsTo(Sort::class, 'sort_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function epoche()
    {
        return $this->belongsTo(Epoche::class, 'epoche_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    /**
     * Add multiple images to the collection.
     *
     * @param array $images
     */
    public function addImages(array $images)
    {
        $existingImages = $this->foto ? explode('|', $this->foto) : [];
        $images = array_merge($existingImages, $images);
        $this->update(['foto' => implode('|', $images)]);
    }

    /**
     * Retrieve multiple images associated with the collection.
     *
     * @return array
     */
    public function getImages()
    {
        return !empty($this->foto) ? explode('|', $this->foto) : [];
    }
}
