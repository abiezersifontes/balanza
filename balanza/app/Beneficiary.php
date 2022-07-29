<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiary extends Model
{
    use SoftDeletes;
    protected $table = 'beneficiarys';
    protected $dates = ['deleted_at'];
    protected $fillable =  ['rif', 'name','phone'];
}
