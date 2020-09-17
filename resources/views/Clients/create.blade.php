
@extends('layout.main')

<style>
  body{
    background-image: url(" ../../../img/fondo2.jpg")
  }
  
</style>
@section('pageTitle', 'Crear categoría')


 
@section('content')
<div class="flex justify-center">
  <div>
<h1 class="text-4xl font-bold text-white flex justify-center">Asignar cliente</h1>


@if (session('error')) 
  <p><strong>Por fafvor, llena correctamente el formulario</strong></p>
@endif

<form action="{{ route('customer.store') }}" method="POST" class="max-w-sm">
  @csrf
<div class="flex">


  <div class="mb-2 mr-2">
    <p class="text-white">Apellidos</p>
    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Primer nombre" class="border">
  </div>

  <div class="mb-2">
    <p class="text-white">nombres </p>
    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Primer nombre " class="border">
  </div>
</div>
<div class="flex">
  <div class="mb-2 mr-2">
    <p class="text-white">Email</p>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="@" class="border">
  </div>

  <div class="mb-2">
    <p class="text-white">DUI</p>
    <input type="text" name="DUI" maxlength="9" minlength="9"  value="{{ old('DUI') }}" placeholder="DUI" class="border">
  </div>

</div>
<div class="flex justify-center">
  <div class="mb-2">
    <p class="text-white">Numero</p>
    <input type="text" name="phone"  maxlength="8" minlength="8" value="{{ old('phone') }}" placeholder="Tel." class="border">
  </div>
</div>

  <input type="hidden" name="dato" value="{{$dato}}">

  <input type="hidden" name="lote_id" value="{{$id}}">

 
 



  <div class="flex justify-center">
  <p class="mt-4"><button class="bg-blue-500 text-white p-2">Guardar</button></p>
</div>
</form>



</div>
</div>
@endsection