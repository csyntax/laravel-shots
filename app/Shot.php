<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shot extends Model
{
    protected $fillable = ['title', 'image'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
