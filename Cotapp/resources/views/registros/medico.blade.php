@extends('principal')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif

{!! Form::open(array('method'=>'POST', 'files'=>false, 'class'=>'form-horizontal control-label','url' => '/medico/create')) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre', array('class'=>'col-sm-2 control-label'))!!}
	<div class="col-sm-10">
		{{ Form::text('nombre','',array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre del medico','required'=>'required')) }}
	</div>
</div>

<div class="form-group">
{!! Form::label('telefono', 'Telefono', array('class'=>'col-sm-2 control-label'))!!}
	<div class="col-sm-10">
		{{ Form::text('telefono','',array('class'=>'form-control', 'placeholder'=>'Ingresa el telefono del medico','required'=>'required')) }}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button class="btn btn-success" type="submit">Registrar Medico</button>
	</div>
</div>

{!! Form::close() !!}


<table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
     <tbody>
	@foreach($medicos as $medico)
		{!! Form::open(['route' => ['medicos.update', $medico->idserviciomedico], 'class'=>'']) !!}
		{{ method_field('PUT') }}
      <tr>
        <td>{{ Form::text('nombre',$medico->nombre,array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre completo','required'=>'required')) }}</td>
        <td>{{ Form::text('telefono',$medico->telefono,array('class'=>'form-control', 'placeholder'=>'Ingresa tu numero de telefono','required'=>'required')) }}</td>
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

