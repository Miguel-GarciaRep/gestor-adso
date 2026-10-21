<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index()
    {
        $aprendices = Aprendiz::latest('id')->paginate(10);

        return view('aprendices.index', compact('aprendices'));
    }

    public function create()
    {
        return view('aprendices.create');
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
}