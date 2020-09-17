<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle', 'hola')</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body background="/img/LoginFondo2.jpg">

    <!--Logo-->
<div class=" h-screen w-full  bg-black bg-opacity-75 ">
    <div class="flex justify-center">
        <img class="w-20 h-auto  mt-4 md:w-32 h-auto" src="/img/logob.png" alt="">
    </div>

    <!--Formulario de registro-->
    <div class="  flex items-center justify-center">
        <div class="w-full max-w-lg  flex-1 ">
            <form action="{{ route('validate') }}" method="POST" class=" bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
              @csrf
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    First Name
                  </label>
                   <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="name" placeholder="Jane">
                  <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Last Name
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" name="lastName" type="text" placeholder="Doe">
                </div>
              </div>
              <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                  </label>
                  <input  name="User" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="email" placeholder="Username">
                </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Password
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" name="password"  type="password" placeholder="******************">
                  <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    Number
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" name="number" type="txt" placeholder="Albuquerque">
                </div>
              </div>
              <div class="flex items-center justify-between">
                <button class="bg-teal-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
                  Register
                </button>
            </div>
          </form>
         
          </div>
        </div>
    </div>
  
     


  </body>
</html>



