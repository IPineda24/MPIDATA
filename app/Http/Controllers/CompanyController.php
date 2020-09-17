<?php

namespace App\Http\Controllers;
use App\model\Company;
use App\model\Customer;
use App\model\Book;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('user_id',auth()->id())->select('id', 'name', 'description','NIT')->get();
        return view('Companies.index',compact('company'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Companies.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:191',
            'description' => 'nullable|string|max:191',
            'NIT' => 'nullable|string|max:14|min:14',
            
        ]);
        $newCompany = new Company($request->only([
            'name', 'description', 'NIT'
        ]));
        $newCompany->user_id =auth()->id();
        $newCompany->save();
        return redirect()->route('company.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
      
        $query =Company::where('user_id',auth()->id())->with('customers')->findOrFail($id);

        

        
        if (!is_null($request->keyword)) {
            $query =Company::where('user_id',auth()->id())->with(['customers'=>function($query) use ($request) {
                $query->where('first_name', 'LIKE', "%{$request->keyword}%")
                ->orWhere('last_name', 'LIKE', "%{$request->keyword}%")->orWhere('DUI', 'LIKE', "%{$request->keyword}%");
            }])->first();
            
               
        }
        $comapany=$query;

      
        return view('Companies.show', compact('comapany','id',));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('user_id',auth()->id())->findOrFail($id);
        return view('Companies.edit', compact('company'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $editCompany = Company::where('user_id',auth()->id())->findOrFail($id);
        $editCompany->fill($request->only([
            'name', 'description', 'NIT'
        ]));
        
        $editCompany->save();
        return redirect()->route('company.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comapany=Company::where('user_id',auth()->id())->find($id);
        $comapany->delete();
        return redirect()->route('company.index');
    }
}
