<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Article;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
