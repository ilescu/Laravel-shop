<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'code', 'price', 'category_id', 'description', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function category()
     {
         return  $this->belongsTo(Category::class);
     }

     public function getPriceForCount()
     {
         if (!is_null($this->pivot)) {
             return $this->pivot->count * $this->price;
         }
         return $this->price;
     }
}
