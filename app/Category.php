<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category'];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('items');
    }
    
    
}
