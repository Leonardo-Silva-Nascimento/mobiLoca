<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rentals;
use App\Models\Customers;
use App\Models\Sellers;
use App\Models\CellPhones;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{

    public function login()
    {
        return view('login');

    }
    public function actionLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $seller = Auth::user();
            $token = $seller->createToken('Laravel')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function forgotPassword(Request $request)
    {
        return true;
    }

    public function home()
    {
        $rentals = Rentals::getActiveRentals();
        $customers = Customers::getAllCustomers();
        $sellers = Sellers::getAllSellers();
        $cellphones = CellPhones::getAllPhones();

        return view('home', compact('rentals', 'customers', 'sellers', 'cellphones'));

    }
    public function createRental(Request $request)
    {
        $rentals = new Rentals();
        $rentals->cliente_id = $request->input('cliente_id');
        $rentals->phone_id = $request->input('phone_id');
        $rentals->valor_mensal = $request->input('valor_mensal');
        $rentals->iniciado_em = now();
        $rentals->expira_em = $request->input('expira_em');
        $rentals->status = 1;
        $rentals->save();
        return response()->json(['Created rental' => $rentals], 200);
    }

    public function createCustomer(Request $request)
    {
        $customer = new Customers();
        $customer->nome = $request->input('nome');
        $customer->sobrenome = $request->input('sobrenome');
        $customer->email = $request->input('email');
        $customer->senha = bcrypt($request->input('senha'));
        $customer->save();
        return response()->json(['Created customer' => $customer], 200);
    }

    public function createSeller(Request $request)
    {
        $seller = new Sellers();
        $seller->nome = $request->input('nome');
        $seller->sobrenome = $request->input('sobrenome');
        $seller->email = $request->input('email');
        $seller->senha = bcrypt($request->input('senha'));
        $seller->save();
        return response()->json(['Created seller' => $seller], 200);
    }

    public function createCellPhone(Request $request)
    {
        $cellPhone = new CellPhones();
        $cellPhone->marca = $request->input('marca');
        $cellPhone->modelo = $request->input('modelo');
        $cellPhone->lançado_em = $request->input('lançado_em');
        $cellPhone->status = 2;
        $cellPhone->save();
        return response()->json(['Created cellphone' => $cellPhone], 200);
    }

    public function updateRental(Request $request)
    {
        $rental = Rentals::find($request->id);
        $rental->cliente_id = $request->input('cliente_id');
        $rental->phone_id = $request->input('phone_id');
        $rental->valor_mensal = $request->input('valor_mensal');
        $rental->iniciado_em = $request->input('iniciado_em');
        $rental->expira_em = $request->input('expira_em');
        $rental->status = $request->input('status', 1);
        $rental->save();
        return response()->json(['Updated rental' => $rental], 200);
    }

    public function updateCustomer(Request $request)
    {
        $customer = Customers::find($request->id);
        $customer->nome = $request->input('nome');
        $customer->sobrenome = $request->input('sobrenome');
        $customer->email = $request->input('email');
        if ($request->input('senha')) {
            $customer->senha = bcrypt($request->input('senha'));
        }
        $customer->save();
        return response()->json(['Updated customer' => $customer], 200);
    }

    public function updateSeller(Request $request)
    {
        $seller = Sellers::find($request->id);
        $seller->nome = $request->input('nome');
        $seller->sobrenome = $request->input('sobrenome');
        $seller->email = $request->input('email');
        if ($request->input('senha')) {
            $seller->senha = bcrypt($request->input('senha'));
        }
        $seller->save();
        return response()->json(['Updated seller' => $seller], 200);
    }

    public function updateCellPhone(Request $request)
    {
        $cellPhone = CellPhones::find($request->id);
        $cellPhone->marca = $request->input('marca');
        $cellPhone->modelo = $request->input('modelo');
        $cellPhone->lançado_em = $request->input('lançado_em');
        $cellPhone->status = $request->input('status', 2);
        $cellPhone->save();
        return response()->json(['Updated cellphone' => $cellPhone], 200);
    }

    public function deleteCustomer(Request $request)
    {
        $customer = Customers::find($request->id);
        $customer->delete();
        return response()->json(['Deleted'], 200);
    }

    public function deleteCellPhone(Request $request)
    {
        $cellPhone = CellPhones::find($request->id);
        $cellPhone->delete();
        return response()->json(['Deleted'], 200);
    }

    public function deleteSeller(Request $request)
    {
        $seller = Sellers::find($request->id);
        $seller->delete();
        return response()->json(['Deleted'], 200);
    }

    public function deleteRental(Request $request)
    {
        $rental = Rentals::find($request->id);
        $rental->delete();
        return response()->json(['Deleted'], 200);
    }

    public function getInfoForEditRental(Request $request)
    {
        $rental = Rentals::find($request->id);
        return response()->json($rental, 200);
    }

    public function getInfoForEditCustomer(Request $request)
    {
        $customer = Customers::find($request->id);
        return response()->json($customer, 200);
    }

    public function getInfoForEditSeller(Request $request)
    {
        $seller = Sellers::find($request->id);
        return response()->json($seller, 200);
    }

    public function getInfoForEditCellPhone(Request $request)
    {
        $cellPhone = CellPhones::find($request->id);
        return response()->json($cellPhone, 200);
    }
}
