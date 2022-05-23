<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user()
    {
        return $this->belongsTo("App\User","user_id");
        //you can write this "belongsTo"  as you like//
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
        //kyike tha lo yay loh ya tl belongsTo ko //
    }
    public function photo()
    {
        return $this->hasMany("App\photo");
       
    }

}
