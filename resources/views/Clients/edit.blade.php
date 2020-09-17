
@extends('layout.main')


@section('pageTitle', 'Crear categoría')

@section('content')

<div class="flex justify-center">
  <div>

  
<h1 class="text-2xl font-bold text-white">Cliente</h1>


@if (session('error')) 
  <p><strong> llena correctamente el formulario</strong></p>
@endif

<form action="{{ route('customer.update',$id) }}" method="POST" class="max-w-sm">
  @csrf
  @method('PUT')
  <div class="flex ">
  <div class="mb-2 mr-2">
    <p class="text-white">Apellidos</p>
    <input type="text" name="last_name" value="{{ $customer->last_name }}" placeholder="Primer nombre" class="border">
  </div>

  <div class="mb-2">
    <p class="text-white">nombres </p>
    <input type="text" name="first_name" value="{{ $customer->first_name }}" placeholder="Primer nombre " class="border">
  </div>
</div>
<div class="flex ">
  <div class="mb-2 mr-2">
    <p class="text-white">Email</p>
    <input type="email" name="email" value="{{ $customer->email  }}" placeholder="m²" class="border">
  </div>

  <div class="mb-2">
    <p class="text-white">DUI</p>
    <input type="text" name="DUI" value="{{ $customer->DUI  }}" placeholder="$" class="border">
  </div>
</div>
<div class="flex justify-center">
  <div class="mb-2 ">
    <p class="text-white">Numero</p>
    <input type="text" name="phone" value="{{ $customer->phone  }}" placeholder="m²" class="border">
  </div>

</div>
<div class="flex justify-center">
  <p class="mt-4"><button class="bg-blue-500 text-white p-2">Guardar</button></p>
</div>
</form>
</div>
</div>
@endsection