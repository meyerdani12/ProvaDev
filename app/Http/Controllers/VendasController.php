<?php

namespace App\Http\Controllers;

use App\VendaItens;
use App\Vendas;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function index()
    {
        return Vendas::all();
    }

    public function show(Vendas $venda)
    {
        return $venda;
    }

    public function store(Request $request)
    {
        $venda = Vendas::create($request->all());

        return response()->json($venda, 201);
    }

    public function update(Request $request, Vendas $venda)
    {
        $venda->update($request->all());

        return response()->json($venda, 200);
    }

    public function delete(Vendas $venda)
    {
        VendaItens::where('venda', $venda->id)->delete(); // Deletar os Itens
        $venda->delete(); // Deleta a venda em si

        return response()->json(null, 204);
    }
}
