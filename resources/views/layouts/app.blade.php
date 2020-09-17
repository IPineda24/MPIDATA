<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body  background="../../img/fondo2.jpg">
    <div class=" ">
        <div class="flex flex-row items-center py-4 mb-4 ">
          @guest
          @else
          <div class="ml-4"><img class="w-16" src="img/logob.png" alt=""> </div>
            <div class="flex-none ml-4 mr-4 text-white"> Hola, {{ Auth::user()->name }}</div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button class="text-blue-700 hover:underline">Cerrar sesión</button>
            </form>
            </div>
          @endguest
        </div>
  
        @section('content')
      
        @show
  
        
  
        @section('scripts')
        @show
      </div>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <script>
        flatpickr("#complete_date", { enableTime: true, minDate: 'today' });
        flatpickr(".range-picker", { mode: 'range' });
        flatpickr(".datepicker");
      </script>
</body>
</html>
