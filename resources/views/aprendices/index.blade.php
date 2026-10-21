@extends('layouts.app')
@section('title','Aprendices')
@section('content')
<h1>Aprendices</h1>
<p><a href="{{ route('aprendices.create') }}">+ Nuevo</a></p>

@if($aprendices->count())
<table border="1" cellpadding="5" style="border-collapse:collapse;width:100%;margin-top:10px">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Ficha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aprendices as $aprendiz)
        <tr>
            <td>{{ $aprendiz->nombre }}</td>
            <td>{{ $aprendiz->documento }}</td>
            <td>{{ $aprendiz->correo }}</td>
            <td>{{ $aprendiz->ficha->numero ?? 'Sin ficha' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $aprendices->links() }}
@else
<p>No hay aprendices registrados.</p>
@endif
@endsection