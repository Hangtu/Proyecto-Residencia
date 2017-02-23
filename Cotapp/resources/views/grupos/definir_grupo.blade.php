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
	.row{
		text-align: center;
	}
</style>

<div class="row">
	<div class="col-sm-offset-3 col-sm-6">
		{!!Form::open(array('method'=>'POST', 'files'=>false, 'class'=>'form-horizontal control-label','action' => 'grupos@store')) !!}
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Equipo</th>
					<th>Grupo</th>
				</tr>
			</thead>
			<tbody>
				@foreach($equipos as $equipo)
				<tr>
					<td>{{$equipo->nombre}}</td>
					<td>{{Form::select('g'.$equipo->idequipo, $grupo, $equipo->grupo, ['class'=> 'form-control',  'placeholder' => 'Seleccione un grupo', 'required'=>'required'])}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="form-group">
			<button class="btn btn-success" type="submit">Guardar</button>
		</div>
		{!! Form::close() !!}
	</div>
</div>


@if(Session::has('true_message'))
<div class="alert alert-success">
	{{ Session::get('true_message') }}
</div>
@endif

@stop()