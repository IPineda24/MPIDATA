@extends('layout.main')
<style>

</style>
@section('pageTitle', 'Crear empresa')

@section('content' )
<div class="  ">
<h1 class="text-4xl mb-8 font-bold flex justify-center text-white">Editar empresa </h1>


<form action="{{ route('company.update',$company->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="_method" value="PUT">

  <div class="flex justify-center ">
  <div class="mb-2">
    <p class="text-white">Nombre de la Empresa</p>
    <input type="text" name="name" value="{{ $company->name }}" placeholder="Nombre de la empresa" class="border">
  </div>
  

  <div class="mb-2 ml-4">
    <p class="text-white">Numero de NIT</p>
    <input type="text" name="NIT" maxlength="14" minlength="14" value="{{ $company->NIT }}" class="border">
  </div>
</div>
<div class="flex justify-center">
  <div class="mb-2 ml-4">
    <p class=" mb-2 text-black  text-white">Descripción de esta empresa</p>
    <textarea class="ml-4" name="description" rows="5" class="border">{{ $company->description }}</textarea>
  </div>
</div>
<div class="flex justify-center">
  <p class="mt-4"><button class="bg-blue-500 text-white p-2">Guardar cambios</button></p>
</div>
  
</form>

</div>
@endsection