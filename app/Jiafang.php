<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jiafang extends Model
{
    protected $table = 'jiafang';
    protected $primaryKey = 'j_id';
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
    //白名单
}
