<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>My Space</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
      body{
        font-family: 'Varela Round', sans-serif;
      }
    </style>
</head>
<body background="../img/fondo2.jpg" >
    <div class="">
        <div class="flex flex-row items-center py-4  ">
          @guest
          @else
          <div class="ml-4"><img class="w-16" src="img/logob.png" alt=""> </div>
            <div class="flex-none ml-4 mr-4 text-white"> Hola, {{ Auth::user()->name }}</div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button class="text-blue-700 font-bold hover:underline">Cerrar sesión</button>
            </form>
            </div>
          @endguest
        </div>


  <div class="flex bg-blue-800 bg-opacity-25 pb-24 ">
      <div class="  w-1/2">
        <div class="container ">
           
            <h2 class="ml-4 text-6xl text-teal-400 font-black tracking-widest">Mis Empresas</h2>
      
             <div class="container ml-4 bg-gray-100 rounded-lg">
              <div class=" ml-2 cont text-2xl text-teal-600 font-black tracking-widest"> <p><a href="<?php echo route('company.create')?>">Crear nueva empresa</a></p>
              </div>
             </div>
              
    <div>
    @foreach ($company as $compa )
        <h1 class="ml-8 pt-4"> <a href="{{ route('company.show', $compa->id) }}" class="text-white  text-2xl hover:underline">&#9889; {{ $compa->name }}</a>  </h1>
    @endforeach
    </div>
      
        </div>
      </div>
        <div class=" w-1/2 flex justify-end mt-48">
            <div class=" cont mr-4 mt-16 "><img width="500px" src="img/icono.svg" alt=""></a></p></div>
        </div>
  </div>
  </body>
  </html>
    
