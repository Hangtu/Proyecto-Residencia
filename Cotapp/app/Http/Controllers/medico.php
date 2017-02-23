<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\MedicoModel;

use Session;

use Validator;

class medico extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $medicos = MedicoModel::get();
        return view('registros.medico')->with('medicos',$medicos);
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
            'telefono' => 'required'
            ],$messages);

        if ($validator->fails()) {
            return redirect('/registro_medico')
            ->withErrors($validator)
            ->withInput();
        }


        $cancha = new MedicoModel;
        $cancha->nombre = $request->input('nombre');
        $cancha->telefono = $request->input('telefono');         
        $cancha->save();

        Session::flash('true_message', 'Medico Registrado');
        return redirect('/registro_medico');
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
        $medico = MedicoModel::find($id);

        $medico->nombre = $request->nombre;
        $medico->telefono = $request->telefono;
        $medico->save();

        return redirect()->route('medicos.index');
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
