<?php

namespace App\Http\Controllers;
use App\model\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      
        $od=$request->ss;
        $id=$request->od;
        $newBook = new Book($request->only([
            'pay_to', 'fail_m'
        ]));
        $newBook->customer_id=$od;
        $newBook->save();
        return redirect()->route('company.show',$id);
    }

 
}
