@extends('principal')


@section('content')

	@if($errors->any())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach
	</div>
	@endif
	
	{!! Form::open(array('method'=>'POST', 'files'=>false, 'class'=>'form-horizontal control-label','action' => 'arbitro@create')) !!}

	<div class="form-group">
		{!! Form::label('nombre', 'Nombre', array('class'=>'col-sm-2 control-label'))!!}
		<div class="col-sm-10">
			{{ Form::text('nombre','',array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre completo','required'=>'required')) }}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('email', 'Email', array('class'=>'col-sm-2 control-label'))!!}
		<div class="col-sm-10">
			{{ Form::email('email','',array('class'=>'form-control', 'placeholder'=>'Ingresa tu correo electronico','required'=>'required')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<button class="btn btn-success" type="submit">Registrar arbitro</button>
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
	@foreach($arbitros as $arbitro)
		{!! Form::open(['route' => ['arbitro.update', $arbitro->id], 'class'=>'we']) !!}
		{{ method_field('PUT') }}
      <tr>
        <td>{{ Form::text('nombre',$arbitro->name,array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre completo','required'=>'required')) }}</td>
        <td>{{ Form::email('email',$arbitro->email,array('class'=>'form-control', 'placeholder'=>'Ingresa tu correo electronico','required'=>'required')) }}</td>
        <td>{{Form::submit('Editar')}}</td>
      </tr>
		 {{ Form::close()}} 
	@endforeach
	 </tbody>
  </table>



	@if(Session::has('password_message'))
	<div class="alert alert-success">
		La contraseña de este usuario es: {{ Session::get('password_message') }}
	</div>
	@endif


@stop()

