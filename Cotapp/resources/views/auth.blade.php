@extends('principal')

@section('content')

<h1>Bienvenido {{Session::get('userName')}}</h1>



<style>
	
	 img{
	 	width:100%;
	 	height: 500px !important;
	 }

</style>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://www.drepuno.gob.pe/web/images/-------jden.png" alt="...">
      <div class="carousel-caption">
        JUEGOS DEPORTIVOS ESCOLARES NACIONALES DE VOLLEYBALL
      </div>
    </div>
    <div class="item">
      <img src="https://i.ytimg.com/vi/fkiYz2oStoU/maxresdefault.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    
    <div class="item">
      <img src="http://portal.andina.com.pe/EDPfotografia3/Thumbnail/2016/09/17/000376725W.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>


  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@endsection