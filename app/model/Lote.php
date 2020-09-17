<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lote extends Model
{
  
    use SoftDeletes;

    protected $fillable = [
        'N_lote',
        'price',
        'prima',
        'square_meters',
        'quota'
        
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function customer()
    {
        return $this->hasone(Customer::class);
    }
    
}
