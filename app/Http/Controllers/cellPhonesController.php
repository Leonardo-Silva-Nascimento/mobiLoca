<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CellPhones;

class cellPhonesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCellPhones()
    {
        $cellPhones = CellPhones::all();
        return response()->json(['cellPhones' => $cellPhones], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createCellPhones(Request $request)
    {
        $cellPhones = new CellPhones();
        $cellPhones->nome = $request->input('nome');
        $cellPhones->sobrenome = $request->input('sobrenome');
        // Outros campos
        $cellPhones->save();

        return response()->json(['Created cellPhones' => $cellPhones], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById(Request $request)
    {
        $cellPhones = CellPhones::find($request->id);

        return response()->json(['cellPhones' => $cellPhones], 200);
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
        $cellPhones = CellPhones::find($request->id);
        $cellPhones->nome = $request->input('nome');
        $cellPhones->sobrenome = $request->input('sobrenome');
        // Outros campos
        $cellPhones->save();

        return response()->json(['Edit cellPhones' => $cellPhones], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cellPhones = CellPhones::find($id);
        $cellPhones->delete();

        return response()->json(['Deleted'], 200);
    }
}
