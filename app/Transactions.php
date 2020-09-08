<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = [
        'code','name','address','postal_code','ekspedisi','user_id','product_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Products');
    }

    protected $casts = [
        'ekspedisi' => 'array'
    ];
}
