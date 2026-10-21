@extends('layouts.app')
@section('title','Nuevo Aprendiz')
@section('content')
<h1>Nuevo Aprendiz</h1>
<form action="{{ route('aprendices.store') }}" method="POST">
 @csrf
 <label>
     Nombre
     <input name="nombre" value="{{ old('nombre') }}" required>
     @error('nombre')<span class="error">{{ $message }}</span>@enderror
 </label><br>
 <label>
     Documento
     <input name="documento" value="{{ old('documento') }}" required>
     @error('documento')<span class="error">{{ $message }}</span>@enderror
 </label><br>
 <label>
     Correo
     <input type="email" name="correo" value="{{ old('correo') }}" required>
     @error('correo')<span class="error">{{ $message }}</span>@enderror
 </label><br>
 <label>
     Ficha
     <select name="ficha_id">
         <option value="">-- Sin ficha --</option>
         @foreach($fichas as $ficha)
         <option value="{{ $ficha->id }}" {{ old('ficha_id') == $ficha->id ? 'selected' : '' }}>{{ $ficha->numero }} - {{ $ficha->programa }}</option>
         @endforeach
     </select>
     @error('ficha_id')<span class="error">{{ $message }}</span>@enderror
 </label><br>
 <button>Guardar</button>
</form>
@endsection