<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function tierlist()
    {
        return TierList::find($this->tierlist_id)->first();
    }

    public function user()
    {
        return User::where('id',$this->user_id)->first();
    }
    
    protected $table = 'comments';
}
