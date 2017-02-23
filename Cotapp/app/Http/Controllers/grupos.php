<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\EquipoModel;

use App\GrupoModel;

use Session;

class grupos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    public function definir(){
        $grupo = GrupoModel::pluck('nombre', 'idgrupo');
        $equipos = EquipoModel::orderBy('idequipo', 'desc')->get();
        return view('grupos.definir_grupo')->with('grupo',$grupo)->with('equipos',$equipos);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $x = EquipoModel::all();
        $size = sizeof($x);
        for ($i=0; $i<($size) ; $i++){
            $equipo =EquipoModel::find((int)$x[$i]->idequipo);
            $equipo->grupo = $request->{'g'.$x[$i]->idequipo};
            $equipo->save();
        }
        Session::flash('true_message', 'Cambios Guardados');
        return redirect('/definir_grupo');   
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
        //
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
