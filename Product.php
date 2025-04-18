<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'price',
        'color',
        'size',
        'image',
        'stock',
        'features',
        'category_id',
        'subcategory_id',
    ];    

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function favoriteBy(){
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

}
