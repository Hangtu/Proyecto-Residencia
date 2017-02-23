<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\EquipoModel;

use App\GrupoModel;

use Session;

use Validator;

class equipo extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = EquipoModel::get();
        $grupos = GrupoModel::pluck('nombre','idgrupo');
        return view('registros.equipo')->with('equipos',$equipos)->with('grupos',$grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $messages = [
        'required' => '* :attribute es requerido.',
        ];

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            ],$messages);

        if ($validator->fails()) {
            return redirect('/registro_equipo')
            ->withErrors($validator)
            ->withInput();
        }


        $equipo = new EquipoModel;
        $equipo->nombre = $request->input('nombre');       
        $equipo->save();

        Session::flash('true_message', 'Equipo Registrado');
        return redirect('/registro_equipo');
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
        $equipo = EquipoModel::find($id);


        $equipo->nombre = $request->nombre;

        $equipo->grupo = $request->grupo;

        $equipo->save();


        return redirect()->route('equipos.index');
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
