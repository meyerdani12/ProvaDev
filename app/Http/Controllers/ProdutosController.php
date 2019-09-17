<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        return Produtos::all();
    }

    public function show(Produtos $produto)
    {
        return $produto;
    }

    public function store(Request $request)
    {
        $produto = Produtos::create($request->all());

        return response()->json($produto, 201);
    }

    public function update(Request $request, Produtos $produto)
    {
        $produto->update($request->all());

        return response()->json($produto, 200);
    }

    public function delete(Produtos $produto)
    {
        $produto->delete();

        return response()->json(null, 204);
    }
}
