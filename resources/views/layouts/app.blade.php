<!doctype html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>@yield('title','Gestor ADSO')</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
 body{max-width:980px;margin:24px auto;font-family:system-ui}
 nav a{margin-right:12px}
 .flash{background:#e6ffed;padding:8px;border-radius:8px;margin-bottom:10px}
 .flash-error{background:#ffe6e6;padding:8px;border-radius:8px;margin-bottom:10px;color:#c00}
 .error{color:#c00;font-size:0.9em;margin-top:2px;display:block}
 input.error, select.error{border-color:#c00}
 </style>
</head>
<body>
 <nav>
 <a href="/aprendices">Aprendices</a>
 <a href="/fichas">Fichas</a>
 </nav>
 @if(session('ok'))<div class="flash">{{ session('ok') }}</div>@endif
 @if(session('error'))<div class="flash-error">{{ session('error') }}</div>@endif
 @if($errors->any())
 <div class="flash-error">
     <ul style="margin:0;padding-left:20px">
         @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
     </ul>
 </div>
 @endif
 @yield('content')
</body>
</html>