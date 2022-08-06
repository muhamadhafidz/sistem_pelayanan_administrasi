<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
