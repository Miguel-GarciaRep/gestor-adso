@extends('layouts.app')
@section('title','Fichas')
@section('content')
<h1>Fichas</h1>
<p><a href="{{ route('fichas.create') }}">+ Nueva Ficha</a></p>

@if($fichas->count())
<table border="1" cellpadding="5" style="border-collapse:collapse;width:100%;margin-top:10px">
    <thead>
        <tr>
            <th>Número</th>
            <th>Programa</th>
            <th>Aprendices</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fichas as $ficha)
        <tr>
            <td>{{ $ficha->numero }}</td>
            <td>{{ $ficha->programa }}</td>
            <td>{{ $ficha->aprendices_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $fichas->links() }}
@else
<p>No hay fichas registradas.</p>
@endif
@endsection