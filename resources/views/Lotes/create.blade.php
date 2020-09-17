
@extends('layout.main')


@section('pageTitle', 'Crear categoría')

@section('content')
<div class=" flex justify-center mt-24">
  <div>
<h1 class="text-4xl mb-4 flex justify-center mr-4  text-white font-bold">Nuevo lote</h1>


@if (session('error')) 
  <p class=""><strong>llena correctamente el formulario</strong></p>
@endif

<form action="{{ route('lote.store') }}" method="POST" class="">
  @csrf
<div class="flex">
  <div class="mb-2 mr-2">
    <p class="text-white  ">Numero de lote</p>
    <input type="text" name="N_lote" maxlength="6"  value="{{ old('N_lote') }}" placeholder="numero de lote" class="border  border-2 border-teal-500 rounded-lg">
  </div>
  
  <div class="mb-2">
    <p class="text-white ">precio</p>
    <input type="text" name="price" maxlength="8"  value="{{ old('price') }}" placeholder="$" class="border  border-2 border-teal-500 rounded-lg">
  </div>
</div>

<div class="flex">
  <div class="mb-2 mr-2">
    <p class="text-white">Cuota mensual</p>
    <input type="text" name="quota" value="{{ old('quota') }}" placeholder="$" class="border  border-2 border-teal-500 rounded-lg">
  </div>

  <div class="mb-2">
    <p class="text-white">prima</p>
    <input type="text" name="prima" value="{{ old('prima') }}" placeholder="$" class="border  border-2 border-teal-500 rounded-lg">
  </div>

</div>
<div class="flex justify-center">
  <div class="mb-2 ">
    <p class="text-white ml-6">Metros cuadrados</p>
    <input type="text" name="square_meters" value="{{ old('square_meters') }}" placeholder="m²" class="border  border-2 border-teal-500 rounded-lg">
  </div>
</div>
  
  <div class="mb-2">
    <p class="text-white">Empresa a la que pertenece</p>
    <select name="company_id" id="company_id" class="w-full  border-2 border-teal-500 rounded-lg">
      <option value="">empresas</option>
      @foreach ($companies as $company)
      <option value="{{ $company->id }}" {{ old('category_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
      @endforeach
    </select>
  </div>
 




  <p class="mt-4 flex justify-center"><button class="bg-blue-500 text-white p-2">Guardar</button></p>
</form>
</div>
</div>
@endsection