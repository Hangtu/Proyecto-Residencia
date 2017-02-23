@extends('principal')


@section('content')

@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif

{!! Form::open(array('method'=>'POST', 'files'=>false, 'class'=>'form-horizontal control-label','url' => '/cancha/create')) !!}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre', array('class'=>'col-sm-2 control-label'))!!}
	<div class="col-sm-10">
		{{ Form::text('nombre','',array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre de la cancha','required'=>'required')) }}
	</div>
</div>

<div class="form-group">
{!! Form::label('address', 'Direccion', array('class'=>'col-sm-2 control-label'))!!}
	<div class="col-sm-10">
		{{ Form::text('address','',array('class'=>'form-control', 'placeholder'=>'Ingresa la direccion de la cancha','required'=>'required')) }}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button class="btn btn-success" type="submit">Registrar cancha</button>
	</div>
</div>

{!! Form::close() !!}


<table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Cordenadas</th>
        <th></th>
      </tr>
    </thead>
     <tbody>
	@foreach($canchas as $cancha)
		{!! Form::open(['route' => ['canchas.update', $cancha->idcancha], 'class'=>'']) !!}
		{{ method_field('PUT') }}
      <tr>
        <td>{{ Form::text('nombre',$cancha->nombre,array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre de la cancha','required'=>'required')) }}</td>
        <td>{{ Form::text('direccion',$cancha->direccion,array('class'=>'form-control', 'placeholder'=>'Ingresa el nombre completo')) }}</td>
        <td>{{ Form::text('cordenadas',$cancha->cordenadas,array('class'=>'form-control', 'placeholder'=>'Ingresa la direccion de la cancha')) }}</td>
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

