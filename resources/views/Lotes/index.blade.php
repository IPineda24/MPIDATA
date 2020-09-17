@extends('layout.main')

@section('content')

<div class="text-white ">
  <div class="cont ml-8 mb-2"> <p><a href="<?php echo route('company.index')?>">volver</a></p></div>
<h1 class="text-4xl font-bold ml-8">Lotificaciones</h1>
<p class="mb-2 ml-8">Administra tus lotes</p>
<p class="mb-2 ml-8">Estimado usuario por el momento solo puede asignar un lote por cliente <br> proximamente podra asignar mas lotes a un cliente. gracias por su comprension :( </p>

<div class="cont ml-8 border-2 border-teal-500 mb-4 rounded-lg text-center bg-teal-500 bg-opacity-50 w-32"> <p><a href="<?php echo route('lote.create',$elid)?>">Crear lotes</a></p></div>
@if (count($lote)> 0)


@else
@endif

@if (count($lote) == 0)
<p>No hay ningun lote</p>
@else

<ol class="list-decimal ">
  @foreach($lote as $lote)
  @if ($lote->status==1)
  <li class="text-red-500 text-sadow ml-8 "><a href="{{ route('lote.show', $lote->id) }}" class="text-red-500  ml-8">lote: {{ $lote->N_lote }}-----------------------> precio:${{ $lote->price }}-----------------------> menusalidad:${{ $lote->price }}</a>
  @else
  <li class="text-blue-500 ml-8 "><a href="{{ route('lote.show', $lote->id) }}" >lote:  {{$lote->N_lote}}-----------------------> precio:${{ $lote->price }}-----------------------> menusalidad:${{ $lote->price }}</a>
    @endif
    @if ($lote->status==0)
    <div class="flex text-teal-500 ml-8">
    <form action="{{ route('login.r',$lote->id ) }}" method="POST" class="flex-none mr-2 ml-8">
      @csrf
      <input type="hidden" name="elid" value="{{$elid}}">
      
     <button>asignar usuario</button>
    </form>
     <form action="{{ route('lote.destroy',$lote->id ) }}" method="POST" class="flex-none mr-2 ml-8">
      @csrf
      @method('DELETE')
      
     <button>/ eliminar lote</button>
    </form></li>
  </div>
    @else
    <h1 class="mb-4">estado: ocupado</h1>
    @endif
 

   
  @endforeach
</ol>
@endif
</div>
@endsection