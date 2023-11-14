<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table='reviews';
    protected $fillable=[
            'user_id',
            'post_id',
            'user_review',
            
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
}
