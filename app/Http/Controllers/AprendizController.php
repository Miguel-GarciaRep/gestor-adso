<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Ficha;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index()
    {
        $aprendices = Aprendiz::with('ficha')->latest('id')->paginate(10);

        return view('aprendices.index', compact('aprendices'));
    }

    public function create()
    {
        $fichas = Ficha::orderBy('numero')->get();
        return view('aprendices.create', compact('fichas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'documento' => ['required', 'string', 'max:40', 'unique:aprendices,documento'],
            'correo' => ['required', 'email', 'max:120', 'unique:aprendices,correo'],
            'ficha_id' => ['nullable', 'integer', 'exists:fichas,id'],
        ]);

        Aprendiz::create($data);

        return redirect()->route('aprendices.index')->with('ok', 'Aprendiz creado');
    }

    public function show(Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function edit(Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function update(Request $request, Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function destroy(Aprendiz $aprendiz)
    {
        abort(404);
    }
}