@extends('principal')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif

{!! Form::open(array('method'=>'POST', 'files'=>false, 'class'=>'form-horizontal control-label','url' => '/jugador/create')) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre', array('class'=>'col-sm-2 control-label'))!!}
	<div class="col-sm-10">
		{{ Form::text('nombre','',array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre del jugador','required'=>'required')) }}
	</div>
</div>

<div class="form-group">
	{!! Form::label('edad', 'Edad', array('class'=>'col-sm-2 control-label'))!!}
	<div class="col-sm-5">
		{{ Form::number('edad','',array('class'=>'form-control', 'placeholder'=>'Ingresa la edad del  jugador','required'=>'required')) }}
	</div>
</div>


<div class="form-group">
	{!! Form::label('equipo', 'Equipo', array('class'=>'col-sm-2 control-label'))!!}
	<div class="col-sm-5">
		{{Form::select('equipo', $equipos, '', ['class'=> 'form-control',  'placeholder' => 'Seleccione un equipo', 'required'=>'required'])}}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button class="btn btn-success" type="submit">Registrar Jugador</button>
	</div>
</div>

{!! Form::close() !!}



<table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Equipo</th>
        <th></th>
      </tr>
    </thead>
     <tbody>
	@foreach($jugadores as $jugador)
		{!! Form::open(['route' => ['jugadores.update', $jugador->idjugador], 'class'=>'']) !!}
		{{ method_field('PUT') }}
      <tr>
        <td>{{ Form::text('nombre',$jugador->nombre,array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre completo','required'=>'required')) }}</td>
        <td>{{ Form::text('edad',$jugador->edad,array('class'=>'form-control', 'placeholder'=>'Ingresa la edad','required'=>'required')) }}</td>
        <td>{{ Form::select('equipo',$equipos,$jugador->fk_equipo,array('class'=>'form-control', 'placeholder'=>'Ingresa el equipo','required'=>'required')) }}</td>
        <td>{{Form::submit('Editar')}}</td>
      </tr>
		 {{ Form::close()}} 
	@endforeach
	 </tbody>
  </table>

@if(Session::has('true_message'))
<div class="alert alert-success">
	{{ Session::get('true_message') }}
</div>
@endif


@stop()

