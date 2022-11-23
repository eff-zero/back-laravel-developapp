<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $hidden = ['created_at', 'updated_at'];
    protected $guarded = [];

    /**
     * This function return categories with it products with
     * a value state equal to 1.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
