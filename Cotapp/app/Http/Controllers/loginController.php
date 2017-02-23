<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class loginController extends Controller{

	public function login(Request $request){

       $email = $request->input('email');
       $password = $request->input('password');

       $consulta = DB::select("SELECT id, tipo, name FROM users WHERE email = '$email' AND password = '$password'");


       if(sizeof($consulta) == 1){
        $value =(int)$consulta[0]->id;

        $request->session()->put('userName', $consulta[0]->name);
        $request->session()->put('userID', $consulta[0]->id);
        $request->session()->put('userTipo', $consulta[0]->tipo);
        Auth::loginUsingId($value);

    }

    return redirect('/');
}


public function logout(){
  Auth::logout();
  return redirect('/');
 }
}
