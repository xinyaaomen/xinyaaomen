<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userx extends Model
{
    protected $table = 'userx';
    protected $primaryKey = 'u_id';
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
    //白名单
}
