@extends('layout.main')

@section('pageTitle', 'Crear empresa')

@section('content')
<h1 class="text-4xl text-white mb-16 font-bold flex justify-center">&#128640 Nueva empresa &#128640</h1>

<div class="  "> 
  
<form class="pt-16 pb-8"  action="{{ route('company.store') }}" method="POST" >
  @csrf
<div class="flex justify-center ">
  <div class="mb-2 mr-24 ">
    <p class="text-white">Nombre de la Empresa</p>
    <input type="text" name="name" value="<?php echo old('name') ?>" placeholder="Nombre de la empresa" class="border-2 border-blue-500">
  </div>
  <div class="mb-2 ml-24">
    <p class="text-white">Numero de NIT</p>
    <input type="text" placeholder="N° NIT" name="NIT" maxlength="14" minlength="14" value="<?php echo old('NIT') ?>" class="border-2 border-blue-500">
  </div>
 
</div>
<div class="flex justify-center ">
  <div class="mb-2  ">
    <p class="text-white">Descripción</p>
    <textarea name="description" rows="4" placeholder="descripcion breve" class="border-2 border-blue-500"><?php echo old('description') ?></textarea>
  </div>
   
</div>

  
<div class="flex justify-center ">
  <div class="mb-24  ">
  <p class="mt-4 "><button class="bg-blue-500 text-white p-2">Guardar</button></p>
</div>
</div>

</form>
</div>
@endsection