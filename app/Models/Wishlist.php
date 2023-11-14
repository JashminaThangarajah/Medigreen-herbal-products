<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'user_id',
        'post_id',
        'status'
        
        ];

        public function products(){
            return $this->belongsTo(Post::class,'post_id','id')->where('status','0');
        }
}
