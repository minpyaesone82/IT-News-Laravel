<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getUser()
    {
        return $this->belongsTo("App\User","user_id");
    }
    public function user()
    {
        return $this->belongsTo("App\User","user_id");
    }
}
