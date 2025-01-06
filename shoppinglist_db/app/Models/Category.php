<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name',
        'icon_name'
    ];
    public function ShoppingItems(){
        return $this->hasMany(ShoppingItem::class, 'category_id');
    }
}
