<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'description', 'NIT'];

    
    public function customers()
    {
        return $this->hasMany(Customer::class,'company_id');
    }
    public function lotes()
    {
        return $this->hasMany(Lote::class,'company_id');
    }

    public function books()
    {
        return $this->hasManyThrough('App\model\Book', 'App\model\Customer');
    }
    
    
}
