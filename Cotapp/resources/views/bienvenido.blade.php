@extends('principal')

@section('content')

    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="http://s3.amazonaws.com/vnn-aws-sites/9151/files/2016/06/788d676002edbadc-d35f5df2edd1dfeb2b801ae2c04ed9f2.jpg" />
        <p id="profile-name" class="profile-name-card"></p>
        {{ Form::open(array('method'=>'POST','class'=>'form_signin','action' => 'loginController@login'))}}
        <form class="form-signin">
            <span id="reauth-email" class="reauth-email"></span>
            {{ Form::email('email','',array('class'=>'form-control', 'placeholder'=>'Usuario','required'=>'required', 'autofocus'=>'autofocus')) }}
            {{ Form::password('password',array('class'=>'form-control', 'placeholder'=>'Contraseña','required'=>'required')) }}
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
        {{ Form::close()}}
        <a href="#" class="forgot-password">
            ¿Olvidaste tu contraseña?
        </a>
    </div><!-- /card-container -->
    
@endsection