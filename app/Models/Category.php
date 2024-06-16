<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function templates()
    {
        return Template::approved()->where([
            'category_id' => $this->id
        ])->get();
    }
    
    protected $table = 'categories';
    protected $fillable = ['name', 'image_path'];
}
