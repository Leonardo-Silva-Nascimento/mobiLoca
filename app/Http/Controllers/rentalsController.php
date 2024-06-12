<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rentals;

class rentalsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllRentals()
    {
        $rentals = Rentals::all();

        return response()->json(['rentals' => $rentals], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createRentals(Request $request)
    {
        $rentals = new Rentals();
        $rentals->nome = $request->input('nome');
        $rentals->sobrenome = $request->input('sobrenome');
        // Outros campos
        $rentals->save();

        return response()->json(['Created rental' => $rentals], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById(Request $request)
    {
        $rentals = Rentals::find($request->id);

        return response()->json(['rental' => $rentals], 200);
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
        $rentals = Rentals::find($request->id);
        $rentals->nome = $request->input('nome');
        $rentals->sobrenome = $request->input('sobrenome');
        // Outros campos
        $rentals->save();

        return response()->json(['Edit rental' => $rentals], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $rentals = Rentals::find($request->id);
        $rentals->delete();

        return response()->json(['Deleted'], 200);
    }
}
