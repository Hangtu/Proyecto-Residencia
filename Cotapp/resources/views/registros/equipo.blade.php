@extends('principal')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif

{!! Form::open(array('method'=>'POST', 'files'=>false, 'class'=>'form-horizontal control-label','url' => '/equipo/create')) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre', array('class'=>'col-sm-2 control-label'))!!}
	<div class="col-sm-10">
		{{ Form::text('nombre','',array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre del equipo','required'=>'required')) }}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button class="btn btn-success" type="submit">Registrar equipo</button>
	</div>
</div>

{!! Form::close() !!}


<table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Grupo</th>
        <th></th>
      </tr>
    </thead>
     <tbody>
	@foreach($equipos as $equipo)
		{!! Form::open(['route' => ['equipos.update', $equipo->idequipo], 'class'=>'']) !!}
		{{ method_field('PUT') }}
      <tr>
        <td>{{ Form::text('nombre',$equipo->nombre,array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre completo','required'=>'required')) }}</td>
        <td>{{ Form::select('grupo',$grupos,$equipo->grupo,array('class'=>'form-control', 'placeholder'=>'Ingresa tu grupo','required'=>'required')) }}</td>
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