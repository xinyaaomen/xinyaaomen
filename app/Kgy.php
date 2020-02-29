<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kgy extends Model
{
    protected $table = 'kgy';
    protected $primaryKey = 'k_id';
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
    //白名单
}
