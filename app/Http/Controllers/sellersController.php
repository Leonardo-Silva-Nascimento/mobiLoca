<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sellers;

class sellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllSellers()
    {
        $sellers = Sellers::all();

        return response()->json(['sellers' => $sellers], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createSellers(Request $request)
    {
        $sellers = new Sellers();
        $sellers->nome = $request->input('nome');
        $sellers->sobrenome = $request->input('sobrenome');
        // Outros campos
        $sellers->save();

        return response()->json(['Created sellers' => $sellers], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById(Request $request)
    {
        $sellers = Sellers::find($request->id);

        return response()->json(['seller' => $sellers], 200);
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
        $sellers = Sellers::find($request->id);
        $sellers->nome = $request->input('nome');
        $sellers->sobrenome = $request->input('sobrenome');
        // Outros campos
        $sellers->save();

        return response()->json(['Edit seller' => $sellers], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $cliente = Sellers::find($request->id);
        $cliente->delete();

        return response()->json(['Deleted'], 200);
    }
}
