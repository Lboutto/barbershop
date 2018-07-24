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
        if (Auth::user()->hasrole('administrator')) {
            $sales    = $this->sale->get();
            $products = $this->sale->where('type', 'producto')->get();
            $services = $this->sale->where('type', 'servicio')->get();
        }
        else{
            $sales    = $this->sale->where('worker_id', Auth::user()->id)->get();
            $products = $this->sale->where('worker_id', Auth::user()->id)->where('type', 'producto')->get();
            $services = $this->sale->where('worker_id', Auth::user()->id)->where('type', 'servicio')->get();
        }
        
        $total = 0.00;
        $totalp = 0.00;
        $totals = 0.00;

        foreach ($sales as $sale) {
            $v1 = $sale->price;
            $total += $v1;
        }

        foreach ($products as $product) {
            $v2 = $product->price;
            $totalp += $v2; 
        }

        foreach ($services as $service) {
            $v3 = $service->price;
            $totals += $v3; 
        }

        if (Auth::user()->hasrole('administrator')) {
            $serv = ($totals*60)/100;
            $profit = $totalp + $serv;
        }
        else{
            $profit = ($totals*40)/100;
        }

        return view('sales.index', compact('sales','total', 'profit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = [
            'Producto' => 'Producto',
            'Servicio' => 'Servicio'
        ];

        return view('sales.create', compact('types'));
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

        $types = [
            'Producto' => 'Producto',
            'Servicio' => 'Servicio'
        ];

        return view('sales.edit', compact('sale', 'types'));
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
