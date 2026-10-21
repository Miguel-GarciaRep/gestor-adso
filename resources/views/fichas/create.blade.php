@extends('layouts.app')
@section('title','Nueva Ficha')
@section('content')
<h1>Nueva Ficha</h1>
<form action="{{ route('fichas.store') }}" method="POST">
 @csrf
 <label>
     Número
     <input name="numero" value="{{ old('numero') }}" required maxlength="20">
     @error('numero')<span class="error">{{ $message }}</span>@enderror
 </label><br>
 <label>
     Programa
     <input name="programa" value="{{ old('programa') }}" required maxlength="120">
     @error('programa')<span class="error">{{ $message }}</span>@enderror
 </label><br>
 <button>Guardar</button>
</form>
@endsection