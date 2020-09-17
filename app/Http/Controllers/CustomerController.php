<?php

namespace App\Http\Controllers;
use App\model\Customer;
use App\model\Lote;
use App\model\Company;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Customer::get();
        return view('Clients.index', compact('client'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $lote = Lote::join('Companies', 'Companies.id', '=', 'Lotes.company_id')->select('Lotes.*')
      ->where('Companies.user_id', auth()->id())
      ->where('Lotes.company_id',$request)->get();

       
        return view('Clients.create', );
    }
  
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      

        $actuLote = Lote::join('Companies', 'Companies.id', '=', 'lotes.company_id')
    ->where('Companies.user_id', auth()->id())
    ->where('lotes.id',$request->lote_id)->update(array('status' => 1));
    
    
    $request->validate([
        'first_name' => 'required|string|max:191',
        'last_name' => 'required|string|max:191',
        'email' => 'nullable|email|max:191',
        'DUI' => 'nullable|string|max:9|min:9',
        'phone' => 'nullable|string|max:8|min:6'
    ]);
    
    $newcustomer = new Customer($request->only([
        'first_name',
        'last_name',
        'email',
        'DUI',
        'phone',
        'lote_id'
        
    ]));
    $newcustomer->company_id = $request->dato;
    $newcustomer->save();


    
    return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        
   
    $people =Company::where('user_id',auth()->id())->with('customers','customers.lote')->with([
        'books'=>function ($query)use ($id){
            
            $query->orderBy('pay_to', 'desc')->where('customer_id',$id);
        }])->findorfail($request->od);

       
        
        return view('Clients.show',compact('people','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer =Customer::find($id);
        return view('Clients.edit',compact('id','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
      
        $editCustomer =Customer::find($id);

        $editCustomer->fill($request->only([
            'first_name',
            'last_name',
            'email',
            'DUI',
            'phone',
            'lote_id'
        ]));
        
        $editCustomer->save();
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $actuLote = Lote::join('Companies', 'Companies.id', '=', 'lotes.company_id')
        ->where('Companies.user_id', auth()->id())
        ->where('lotes.id',$request->od)->update(array('status' => 0));
        $customer=Customer::find($id);
        $customer->delete();

       return redirect()->route('company.index');
    }
}
