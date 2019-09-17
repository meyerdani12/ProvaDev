<?php

namespace App\Http\Controllers;

use App\Produtos;
use App\VendaItens;
use Illuminate\Http\Request;

class VendaItensController extends Controller
{
    public function index()
    {
        return VendaItens::all();
    }

    public function show(VendaItens $vendaitem)
    {
        return $vendaitem;
    }

    public function store(Request $request)
    {
        $item = $request->item;

        $produto = Produtos::where('id', $item)->first();

        if ($produto->estoque >= $request->quantidade) {
            $vendaitem = VendaItens::create($request->all());

            $produto->update([
                "estoque" => $produto->estoque - $request->quantidade
            ]);

            return response()->json($vendaitem, 201);
        } else {
            return response()->json([
                "message" => "Você não possui estoque para fazer essa venda"
            ], 500);
        }
    }

    public function delete(VendaItens $vendaitem)
    {
        $item = $vendaitem->item;

        $produto = Produtos::where('id', $item)->first();

        $produto->update([
            "estoque" => $produto->estoque + $vendaitem->quantidade
        ]);

        $vendaitem->delete();

        return response()->json(null, 204);
    }
}
