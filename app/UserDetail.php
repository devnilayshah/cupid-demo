<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public $guarded = ['id'];

    protected $casts = [
        'date_of_birth'=>'date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
