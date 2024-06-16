<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TierList extends Model
{
    use HasFactory;

    public function user(){
        return User::find($this->user_id)->first();
    }

    public function template(){
        return Template::approved()->where('id', $this->template_id)->first();
    }

    public function templateRelation(){
        return $this->belongsTo(Template::class, 'template_id', 'id');
    }

    public function comments(){
        return Comment::where('tierlist_id', $this->id)->get();
    }

    protected $table = 'tierlists';
}
