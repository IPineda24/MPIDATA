<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['pay_to', 'fail_m'];
    

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    
}
