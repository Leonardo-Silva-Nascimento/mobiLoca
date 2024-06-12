<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class customersController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCustomers()
    {
        $customers = Customers::all();

        return response()->json(['customers' => $customers], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createCustomers(Request $request)
    {
        $customer = new Customers();
        $customer->nome = $request->input('nome');
        $customer->sobrenome = $request->input('sobrenome');
        // Outros campos
        $customer->save();

        return response()->json(['Created customer' => $customer], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById(Request $request)
    {
        $customer = Customers::find($request->id);

        return response()->json(['customer' => $customer], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = Customers::find($request->id);
        $customer->nome = $request->input('nome');
        $customer->sobrenome = $request->input('sobrenome');
        // Outros campos
        $customer->save();

        return response()->json(['Edit customer' => $customer], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $customer = Customers::find($request->id);
        $customer->delete();

        return response()->json(['Deleted'], 200);
    }
}
