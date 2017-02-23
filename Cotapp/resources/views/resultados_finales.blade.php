@extends('principal')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif





@foreach($grupos as $grupo)
<h2>Grupo {{$grupo->nombre}}</h2>
<table class="table">
	<thead>
		<tr>
			<th>Equipo</th>
			<th>JG</th>
			<th>JP</th>
			<th>PF</th>
			<th>PC</th>
			<th>COS</th>
			<th>Lugar</th>
		</tr>
	</thead>
	<tbody>
		@foreach($grupo->equipos->sortByDesc('resultados.PF') as $index => $equipo)
		<tr style="background-color: #dff0d8;">
		    <td>{{$equipo->nombre}}</td>
			<td>{{$equipo->resultados->JG}}</td>
			<td>{{$equipo->resultados->JP}}</td>
			<td>{{$equipo->resultados->PF}}</td>
			<td>{{$equipo->resultados->PC}}</td>
			<td>{{$equipo->resultados->COS}}</td>
			<td>{{$index+1}}</td>
		</tr>
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

