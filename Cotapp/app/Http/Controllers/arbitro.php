<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Session;

use Validator;

class arbitro extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
     $arbitros = User::get();
     return view('registros.arbitro')->with('arbitros',$arbitros);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $messages = [
        'required' => '* :attribute es requerido.',
        ];

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'email' => 'required'
            ],$messages);

        if ($validator->fails()) {
            return redirect('/registro_arbitros')
            ->withErrors($validator)
            ->withInput();
        }


        $usuario = new User;
        $usuario->name = $request->input('nombre');
        $usuario->password = str_random(7);
        $usuario->email = $request->input('email');         
        $usuario->tipo = 1;
        $usuario->save();

        Session::flash('password_message', $usuario->password);
        return redirect('/registro_arbitros');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
          $arbitro = User::find($id);

          $arbitro->name = $request->nombre;

          $arbitro->email = $request->email;

          $arbitro->save();

          return redirect()->route('arbitro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
