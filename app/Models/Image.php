<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Image as InterventionImage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image_path'];

    public static function store($image): string
    {
        $path = $image->store('images', 'public');
        return $path;
    }

    public static function get($image): string
    {
        return storage_path('app/public/' . $image);
    }
}
