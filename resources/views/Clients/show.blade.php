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
        border-bottom: 1px solid black;
        border-top: 1px solid black;
        padding: 15px;
        
    }

    body{
      font-family: 'Varela Round', sans-serif;
    }
</style>
<body class="">
    @section('content')
    <div class="container  text-white ml-8  ">
      
        <H1  class=" text-6xl flex justify-center  text-teal-400">Estado del cliente</H1>
       
        
        
          
      <table class="flex justify-center">
        <tr>
            <td >Nombre</td>
            <td>Apellido</td> 
            <td>Email</td>
            <td>Numero de Dui</td>
            <td>Numero de telefono</td>
            <td>Lote asignado</td>
            <td>precio de lote</td>  
            <td>mensualidad</td>  
            <td>prima</td>
            <td>total pagado</td>
           
        </tr>
        @foreach ($people->customers as $p )
        
        @if ($p->id==$id)
        <div class="flex justify-end mb-4">
        <div class="cont mr-4 "> <p><a href="<?php echo route('customer.edit',$p->id,$id)?>">editar usuario</a></p></div>
        <form action="{{ route('customer.destroy', $id) }}" method="POST" class="flex-none mr-2  " onsubmit="return confirm('¿Realmente quieres eliminar todo los datos de la este usuario?');">
            @csrf
            @method('DELETE')
            <input type="hidden" name="od" value="{{$p->lote_id}}">
           <button class="text-red-500">eliminar</button>
          </form>
        </div>
        <tr>
            <td>{{ $p->first_name }}</td>
            <td>{{ $p->last_name }}</td>
        <td>{{ $p->email }}</td>
    <td>{{ $p->DUI }}</td>
    <td>{{ $p->phone }}</td>
    @foreach ($people->lotes as $lote )
    @if ($lote->id==$p->lote_id)
    <td>{{ $lote->N_lote }}</td>  
    <td>${{ $lote->price }}</td>  
    <td>${{ $lote->quota }}</td>  
    <td>${{ $lote->prima }}</td>
  
    @endif

    @endforeach
    <td>
     $ {{$people->books->count()*$lote->quota}}

     </td>
        </tr>
        @endif
        @endforeach
         
         
      </table>


      <table class="mt-8 bg-teal-400 bg-opacity-75">
        <tr >
          <td class=" border-r-2 border-black">fechas pagadas</td><td>fechas retrsadas</td>
      </tr>
      <tr>
        @foreach ($people->customers as $p )
        @foreach ($people->books as $b )
        @if ($p->id==$id)
        <tr>
            
            @if ($b->pay_to==$b->fail_m)
            <td class=" border-r-2 border-black">{{ $b->pay_to }}</td>
            <td >{{ $b->fail_m }}</td> 
            
            @else
            <td  class=" border-r-2 border-black bg-red-600" >{{ $b->pay_to }}</td>
            <td  class="  bg-red-600">{{ $b->fail_m }}</td> 
            @endif
           
        </tr>
        @endif
        @endforeach
        @endforeach
      </tr>
    </table>
       
      @endsection


  
  
  </body>
  </html>
    


