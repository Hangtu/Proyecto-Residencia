@extends('principal')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif



  <h2>Protesta</h2>
  <p>{{$protesta->descripcion}}</p>
  
  {!! Form::open(['route' => ['mensaje_protesta.update', $protesta->idprotesta], 'class'=>'']) !!}
  {{ method_field('PUT') }}
    

    <div class="form-group">
      <label for="comment">comentario resolutivo:</label>
      {{ Form::textarea('notes',$protesta->resolutivo, ['class' => 'form-control']) }}
      
    </div>

    <button type="submit" class="btn btn-success">Enviar</button>
  {!! Form::close() !!}





@if(Session::has('true_message'))
<div class="alert alert-success">
	{{ Session::get('true_message') }}
</div>
@endif
@stop()

