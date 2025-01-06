<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingItem extends Model
{
    protected $fillable=[ 
        'text',
        'high_prio',
        'category_id'
    ];
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
