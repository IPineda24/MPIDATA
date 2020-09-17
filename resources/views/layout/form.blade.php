<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle', 'hola')</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body background="/img/fondo.jpg">

    
<div class=" h-screen w-screen  bg-black bg-opacity-75 ">
    <div class="flex justify-center">
        <img class="w-24 h-auto  mt-4 md:w-48 h-auto" src="/img/logob.png" alt="">
    </div>

    <div class="  flex items-center justify-center">
        <div class="w-full max-w-xs flex-1 ">
            <form action="{{ route('login') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Username
                </label>
                <input  name="User" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="email" placeholder="Username">
              </div>
              <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                  Password
                </label>
                <input  name="Password" class="shadow appearance-none border border-teal-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                <p class="text-teal-500 text-xs italic">ingresa tu contraseña</p>
              </div>
              <div class="flex items-center justify-between">
                <button class="bg-teal-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline  href="<?php echo route('Singin')?>" >
                  
                    Sing In
                 
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="<?php echo route('register')?>">
                 Register
                </a>
              </div>
            </form>
           
          </div>
    </div>
    </div>
  
     


  </body>
</html>