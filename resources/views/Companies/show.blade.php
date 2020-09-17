@extends('layout.main')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>My Space</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
    td{
        text-align: center;
        border-top: 2px solid black;
    }
    body{
        background-image: url( "../img/fondo2.jpg");
        font-family: 'Varela Round', sans-serif;
    }
</style>
<body >
    @section('content')
    <div class="container ml-2  ">
        
        <h1 class="text-2xl  text-white font-bold"><a href="{{route('company.index')}}"> &#x21B5; regresar a empresas</a></h1>
        
        <h1  class="font-black flex justify-center  text-teal-500 text-6xl ">{{ $comapany->name}}</h1>
        <h1 class="text-xl flex justify-center  mb-8 text-white"> Descripción: {{ $comapany->description}}</h1>

        
        
<div class="flex justify-center ml-8 mb-16 w-full ">
    <form class=" flex justify-center w-full text-white" action="{{ route('company.show',$id) }}" method="GET">
        <input type="text" class=" text-black form-input border-2 rounded-lg border-gray-800 w-1/2" name="keyword" id="keyword" value="{{ request()->get('keyword') }}">
        <button class="text-xl font-bold">buscar</button>
    </form>
         
        </div>
        <div class="flex ml-8 flex justify-center text-teal-500">
       
        
            <div class=" bg-white font-bold text-center cont w-48  text-xl mb-8 border-2 rounded-lg border-blue-300"> <p><a href="<?php echo route('company.edit',$comapany->id)?>">editar empresas</a></p></div>
            <div class=" ml-2 mr-2 bg-white  rounded-lg border-2 border-teal-500 cont ml-2  text-xl mb-2 text-blue-700 h-10 font-bold text-center"> <p class=""><a href="<?php echo route('lote.show', $comapany->id)?>">Administrar Lotes</a></p></div>
            <form class=" bg-white text-red-600 font-bold text-center w-48 text-xl mb-8 border-2 rounded-lg border-red-500" action="{{ route('company.destroy', $comapany->id) }}" method="POST" class="flex-none mr-2" onsubmit="return confirm('¿Realmente quieres eliminar todo los datos de la empresa?');">
                @csrf
                @method('DELETE')
                
               <button class="font-bold">eliminar empresa</button>
              </form>
            </div>
        <div class="flex ml-16 ">
      <table class=" bg-black bg-opacity-50  text-white w-full" >
          <tr>
              <td></td>
            <td >Nombre de cliente</td><td>Numero de DUI</td> <td>Fecha a pagar</td><td>cuando se pago</td><td></td>
          </tr>
         
          @foreach ($comapany->customers as $people )
         
          <tr>
            <td class="text-2xl pr-4">👤</td>
           <td class=" text-left">  
 {{ $people->first_name}}  {{ $people->last_name}}</a>
 <form action="{{ route('customer.show', $people->id) }}" method="PUT" class="flex-none mr-2" >
    <input type="hidden" name="od" value="{{$comapany->id}}">
    <input type="hidden" name="id" value="{{$people->id}}">
   <button class="text-purple-700 rounded-lg font-black">ver Usuario</button>
  </form> </td>
          <td class=" text-left pl-4">{{ $people->DUI}}</td>
             <form action="{{ route('book.store') }}" method="POST" class="flex-none mr-2"onsubmit="return confirm('¿Agregar fecha de pago');">
                <td>
                @csrf
                
                <input type="hidden" name="ss" value="{{$people->id}}">
                <input type="hidden" name="od" value="{{$comapany->id}}">
              
                
                <div class="mb-2  color-black-500">
                    <p><label for="complete_date" class="form-label"></label></p>
                    <input type="date" name="pay_to" id="pay_to" value="<?php echo old('pay_to') ?>" placeholder="Selecciona fecha y hora" class="form-input">
                  </div>          
             
           </li></td>  

           <td class="border-r-2 border-black pl-8">
           
            
            
            <div class="mb-2  color-black-500 ">
                <p><label for="complete_date" class="form-label"></label></p>
                <input type="date" name="fail_m" id="fail_m" value="<?php echo old('fail_m') ?>" placeholder="Selecciona fecha y hora" class="form-input">
              </div>          
       
       </li></td>  
      <td class="text-teal-400"><button >Agregar</button></td> 
         
    </form>
         
          



        </tr>
        
         
          @endforeach
      </table>
  
    </div>
      @endsection


  
  
  </body>
  </html>
    


