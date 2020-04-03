<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_level extends Model
{
    protected $table = 'user_level';
    protected $primaryKey = 'idUserLevel';

    public $timestamps = false;

    public function User()
    {
        return $this->belongsTo('App\User','id');
    }
}
