<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\EquipoModel;

use App\JugadorModel;

use Session;

use Validator;

class jugador extends Controller{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   public function index(){
       $equipos = EquipoModel::pluck('nombre', 'idequipo');
       $jugadores = JugadorModel::get();
 	   return view('registros.jugador')->with('equipos', $equipos)->with('jugadores',$jugadores);
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
    		'edad' => 'required',
    	 	'equipo' => 'required',
    		],$messages);

    	if ($validator->fails()) {
    		return redirect('/registro_jugador')
    		->withErrors($validator)
    		->withInput();
    	}


    	$jugador = new JugadorModel;
    	$jugador->nombre = $request->input('nombre');
    	$jugador->edad = $request->input('edad');
    	$jugador->fk_equipo = $request->input('equipo');         
    	$jugador->save();

    	Session::flash('true_message', 'Jugador Registrado');
    	return redirect('/registro_jugador');

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
    public function update(Request $request, $id)
    {

        $jugador = JugadorModel::find($id);
        $jugador->nombre = $request->nombre;
        $jugador->edad = $request->edad;
        $jugador->fk_equipo = $request->equipo;

        $jugador->save();

        return redirect()->route('jugadores.index');
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
