<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Customer extends Model
{
    use SoftDeletes;
 
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'DUI',
        'phone',
        'lote_id'
    ];
  
   
    
    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function books()
    {
        return $this->hasMany(Book::class,'customer_id');
    }

    public function lastbook()
    {
        return $this->hasOne(Book::class,'customer_id');
    }
    
    
}
