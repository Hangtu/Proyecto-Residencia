<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

use Validator;

use App\CanchaModel;

class cancha extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canchas = CanchaModel::get();
        return view('registros.cancha')->with('canchas',$canchas);
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
            'address' => 'required'
            ],$messages);

        if ($validator->fails()) {
            return redirect('/registro_cancha')
            ->withErrors($validator)
            ->withInput();
        }


        $cancha = new CanchaModel;
        $cancha->nombre = $request->input('nombre');
        $cancha->direccion = $request->input('direccion');         
        $cancha->save();

        Session::flash('true_message', 'Cancha Registrada');
        return redirect('/registro_cancha');
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
         $cancha =  CanchaModel::find($id);

         $cancha->nombre =  $request->nombre;
         $cancha->direccion = $request->direccion;
         $cancha->cordenadas = $request->cordenadas;

         $cancha->save();

         return redirect()->route('canchas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo 'deleted';
    }
}
