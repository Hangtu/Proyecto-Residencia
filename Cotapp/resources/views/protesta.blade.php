@extends('principal')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif

<ul class="list-group">

@foreach($protestas as $protesta)
   <a href="/mensaje_protesta/{{$protesta->idprotesta}}" class="list-group-item">{{$protesta->nombre}}</a>
@endforeach
</ul>


@if(Session::has('true_message'))
<div class="alert alert-success">
	{{ Session::get('true_message') }}
</div>
@endif
@stop()

