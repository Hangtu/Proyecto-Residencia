@extends('principal')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif


<style>
	.result_input{
		text-align: center;
		width: 70px;
		float:left;
	}
</style>

@if(Session::has('error_message'))
<div class="alert alert-warning">
	{{ Session::get('error_message') }}
</div>
@endif

<a href="/crear_encuentros" class="btn btn-success">Crear Encuentros</a>

@foreach($grupos as $grupo)

<h2>Grupo {{$grupo->nombre}}</h2>
<table class="table">
	<thead>
		<tr>
			<th>Equipo 1</th>
			<th>VS</th>
			<th>Equipo 2</th>
			<th>Cancha</th>
			<th>Fecha</th>
			<th>Arbitros</th>
			<th width="13%">Servicio Medico</th>
			<th>Resultados</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($encuentros as $encuentro)
		@if($encuentro->fk_grupo == $grupo->idgrupo )
		{!! Form::open(array('method'=>'POST', 'files'=>false, 'class'=>'control-label','action' => 'encuentro@update')) !!}
		 {{ Form::hidden('id_encuentro', $encuentro->idencuentro)}}
		<tr style="background-color: #dff0d8;">
			<td>{{$encuentro->equipo1->nombre}}</td>
			<td></td>
			<td>{{$encuentro->equipo2->nombre}}</td>
			<td>{{Form::select('cancha', $canchas, $encuentro->fk_cancha, ['class'=> 'form-control',  'placeholder' => 'Seleccione una cancha', 'required'=>'required'])}}</td>
			<td>{{Form::date('date', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',($encuentro->fecha == NULL) ? \Carbon\Carbon::now() : $encuentro->fecha ))}}</td>
			<td>{{Form::select('arbitro', $arbitros, $encuentro->fk_usuario, ['class'=> 'form-control',  'placeholder' => 'Seleccione un arbitro', 'required'=>'required'])}}</td>
			<td>{{Form::select('medico', $medicos, $encuentro->fk_servicio_medico, ['class'=> 'form-control',  'placeholder' => 'Seleccione un servicio medico', 'required'=>'required'])}}</td>
			<td>{{Form::number('res1', $encuentro->resultado ,array('class' => 'result_input  form-control'))}}{{Form::number('res2', $encuentro->resultado2, array('class' => 'result_input form-control'))}}</td>
			<td><button class="btn btn-success" type="submit">Guardar</button></td>
		</tr>
		{{ Form::close()}} 
		@endif

		@endforeach	
		
	</tbody>
</table>
@endforeach




@if(Session::has('true_message'))
<div class="alert alert-success">
	{{ Session::get('true_message') }}
</div>
@endif

@stop()