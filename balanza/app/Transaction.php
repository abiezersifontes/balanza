<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transactions';
    protected $dates = ['deleted_at'];
    protected $fillable =  ['input_weight', 
                            'output_weight', 
                            'type',
                            'state',
                            'driver_rif', 
                            'vehicle_id', 
                            'beneficiary_rif', 
                            'users_id',
                            'product_id'    
                            ];
}
