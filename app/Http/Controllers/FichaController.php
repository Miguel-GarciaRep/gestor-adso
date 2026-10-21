<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    public function index()
    {
        $fichas = Ficha::withCount('aprendices')->latest('id')->paginate(10);
        return view('fichas.index', compact('fichas'));
    }

    public function create()
    {
        return view('fichas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero' => ['required', 'string', 'max:20', 'unique:fichas,numero'],
            'programa' => ['required', 'string', 'max:120'],
        ]);

        Ficha::create($data);

        return redirect()->route('fichas.index')->with('ok', 'Ficha creada');
    }
}