<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\CreateRequest;
use App\Http\Requests\Customer\UpdateRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::customersFilter($request->customer_data);

        return view('customers.index', compact('customers', $customers) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        Customer::create($request->all());

        $request->session()->flash('message', 'Cliente ha sido agregado correctamente');

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        if( is_null($customer) ){
            return redirect()->route('customers.index');
        }

        return view('customers.info')->with('customer',$customer);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        if( is_null($customer) ){
            return redirect()->route('customers.index');
        }

        return view('customers.create_or_edit')->with('customer',$customer);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $customer = Customer::find($id);

        if( is_null($customer) ){
            return redirect()->route('customers.index');
        }

        $customer->update( $request->all() );

        $request->session()->flash('message', 'El cliente se ha actualizado correctamente');

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        if( $request->ajax() ){

            $customer = Customer::find($id);

            if( is_null($customer) ){
                return response()->json([
                    'status' => FALSE,
                    'message' => 'Error, no se ha encontrado el cliente',
                ], 404);
            }

            //$customer->delete();

            return response()->json([
                'status' => TRUE,
                'message' => 'Cliente eliminado correctamente',
            ], 200);

        }

        return response()->json([
            'status' => FALSE,
            'message' => 'Error inesperado, intente de nuevo más tarde',
        ], 500);
    }
}
