<?php

namespace App\Http\Controllers;

use App\model\Lote;
use App\model\Company;
use App\model\Customer;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    public function create()
    {

        $companies = Company::where('user_id', auth()->id())->with('customers')->get();
        return view('Lotes.create', compact('companies'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newLote = Lote::join('Companies', 'Companies.id', '=', 'lotes.company_id')
            ->where('Companies.user_id', auth()->id())->get();

        Company::findOrFail($request->company_id);

        $newLote = new Lote($request->only([
            'N_lote',
            'price',
            'prima',
            'square_meters',
            'quota'
        ]));
        $newLote->status =0;
        $newLote->company_id = $request->company_id;
        $newLote->save();

        return redirect()->route('lote.show',$request->company_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  $lotes = Lote::select('*')->where('company_id', $id)->with('company')->get();
      //  $companies = Company::select('id', 'name')->where('user_id', auth()->id())->get();
      $elid=$id;
      $lote = Lote::join('Companies', 'Companies.id', '=', 'Lotes.company_id')->select('Lotes.id','Lotes.N_lote','Lotes.price','Lotes.quota','Lotes.status')
      ->where('Companies.user_id', auth()->id())
      ->where('Lotes.company_id',$id)->get();

     

      
      
        return view('Lotes.index', compact('lote','elid'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::select('id', 'name')->where('user_id', auth()->id())->get();
        return view('Lotes.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editLote = Lote::join('Companies', 'Companies.id', '=', 'lotes.company_id')
            ->where('Companies.user_id', auth()->id())->get();
        $editLote = Lote::select('*')->where('company_id', $id)->with('company')->findOrFail($id);
        $editLote = Company::where('user_id', auth()->id())->findOrFail($id);
     
        $request->validate([
            'N_lote' => 'required|string|max:191',
            'price' => 'required|int|max:7',
            'prima' => 'nullable|int|max:7',
            'square_meters' => 'nullable|int|max:9',
            'quota' => 'nullable|int|max:8'
        ]);
        $editLote->fill($request->only([
            'N_lote',
            'price',
            'prima',
            'square_meters',
            'quota'
        ]));

        $editLote->save();
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lote=Lote::find($id);
        $lote->delete();
        return redirect()->route('lote.show',$id);
    }
}
