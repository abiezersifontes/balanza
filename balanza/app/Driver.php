<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    protected $table = 'drivers';
    protected $dates = ['deleted_at'];
    protected $fillable =  ['rif', 'name','phone'];
}
