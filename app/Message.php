<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'item_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
