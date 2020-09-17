<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoApp | @yield('pageTitle', 'Bienvenidos')</title>
    <link href="{{ asset('css/my-tailwind.css') }}" rel="stylesheet">
  </head>
  <body background="../../img/fondo2.jpg">
    <div class="">
      <div class="flex flex-row items-center py-4 mb-4  ">
        @guest
        @else
        <div class="ml-4 editar"><img class="w-16" src="../../../img/logob.png" alt=""> </div>
          <div class="flex-none text-white ml-4 mr-4">Hola, {{ Auth::user()->name }}</div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
              <button class="text-blue-700  font-bold hover:underline">Cerrar sesión</button>
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
    </script>
  </body>
</html>