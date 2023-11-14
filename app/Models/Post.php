<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'qty',
        'image',
        'meta_title',
        'meta_description',
       'meta_keyword',
       'status',
    ];
//To get the link of category in the product table
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }


    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
