<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\model\Customers;
use App\model\Lote;
use App\model\Company;
use Illuminate\Http\Request;

class UserLogin extends Controller
{
    public function login(Request $request,$id)
   
    {
        
        $dato=$request->elid;
        $lotex=Lote::join('Companies', 'Companies.id', '=', 'Lotes.company_id')->select('Lotes.*')
        ->where('Companies.user_id', auth()->id())
        ->where('Lotes.company_id',$dato)->get();
       
         
          return view('Clients.create',compact('lotex','dato','id'));
    }

    public function Singin()
    {
        return redirect()->route('company.index');
    }

    
}
