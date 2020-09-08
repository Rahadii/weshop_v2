<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['slug','photo','name','description','stock','category_id','user_id','weight'];

    function user(){
        return $this->belongsTo('App\User');
    }
}
