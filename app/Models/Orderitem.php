<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    protected $table='order_items';
    protected $fillable=[
            'order_id',
            'post_id',
            'price',
            'qty',
                       
    ];

    public function products()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }
}
