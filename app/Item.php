<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['image_file_name', 'name', 'description', 'category_id', 'time_limit', 'nego_status', 'imgpath'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('messages');
    }
}
