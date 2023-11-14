<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orderitem;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=[
            'user_id',
            'tracking_no',
            'tracking_msg',
            'payment_method',
            'payment_id',
            'total_price',
            'payment_status',
            'order_status',
            'cancel_reason',
            'notify',
            
            
    ];

    public function orderitems()
    {
       return $this->hasMany(Orderitem::class);
    }

    public function products()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
