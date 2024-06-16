<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';

    protected $hidden = ['approved'];

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }

    public function user(){
        return User::where('id', $this->user_id)->first();
    }
    
    public function category(){
        return Category::where('id', $this->category_id)->first();
    }
}

