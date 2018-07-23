<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use Auth;

class SaleController extends Controller
{
    public function __construct(Sale $sale)
    {
        $this->middleware('auth');
        $this->sale     = $sale;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = $this->sale->get();

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Process
        $this->validate($request,[
            'type'        => 'required|string',
            'name'        => 'required|string',
            'description' => 'required|string',
            'price'       => 'regex:/^\d*(\.\d{1,2})?$/',
        ]);

        $data = [ 
            'type'          => $request->type,
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'worker_id'     => Auth::user()->id
        ];

        //Create Sale
        $sale = $this->sale->create($data);

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = $this->sale->findOrFail($id);

        $disable = true;

        return view('sales.view', compact('sale', 'disable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = $this->sale->findOrFail($id);

        return view('sales.edit', compact('sale'));
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
        //Process
        $this->validate($request,[
            'type'        => 'required|string',
            'name'        => 'required|string',
            'description' => 'required|string',
            'price'       => 'regex:/^\d*(\.\d{1,2})?$/',
        ]);

        $sale = $this->sale->findOrFail($id);

        $data = [ 
            'type'          => $request->type,
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'worker_id'     => Auth::user()->id
        ];

        //Update Sale
        $sale->update($data);

        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Process
        $sale = $this->sale->findOrFail($id);

        // Delete Sale
        $sale->delete();

        return redirect()->route('sales.index');
    }
}
