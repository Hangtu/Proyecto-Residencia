<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\EncuentroModel;

use App\EquipoModel;

use App\GrupoModel;

use App\CanchaModel;

use App\MedicoModel;

use App\User;

use Session;

use Validator;


class encuentro extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $grupos = GrupoModel::all();
        $encuentros =  EncuentroModel::all();
        $canchas = CanchaModel::pluck('nombre', 'idcancha');
        $medicos = MedicoModel::pluck('nombre', 'idserviciomedico');
        $arbitros = User::where('tipo','1')->pluck('name', 'id');

        foreach ($encuentros as $encuentro) {
            $encuentro->equipo1;
        }

        foreach ($encuentros as $encuentro) {
            $encuentro->equipo2;
        }

        foreach ($encuentros as $encuentro) {
            $encuentro->cancha;
        }

        // return response($encuentros);

        return view ('registros.encuentro')->with('grupos',$grupos)->with('encuentros',$encuentros)
        ->with('canchas',$canchas)->with('medicos',$medicos)->with('arbitros',$arbitros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        EncuentroModel::truncate();
        $grupo = GrupoModel::all();
        for ($j=0; $j < sizeof($grupo); $j++) {
            $equipos = EquipoModel::where('grupo',$grupo[$j]->idgrupo)->get();
            $noEquipos = sizeof($equipos);
            if($noEquipos > 0 && $noEquipos < 5){
                for ($i=1; $i < $noEquipos ; $i++) { 
                   $encuentro = new EncuentroModel;
                   $encuentro->fk_equipo1 = $equipos[0]->idequipo;
                   $encuentro->fk_equipo2 = $equipos[$i]->idequipo;
                   $encuentro->fk_grupo = $equipos[0]->grupo;
                   $encuentro->fk_usuario = Session::get('userID');
                   $encuentro->save();
               }
               if ($noEquipos == 3 ){
                 $encuentro = new EncuentroModel;
                 $encuentro->fk_equipo1 = $equipos[1]->idequipo;
                 $encuentro->fk_equipo2 = $equipos[2]->idequipo;
                 $encuentro->fk_grupo = $equipos[1]->grupo;
                 $encuentro->fk_usuario = Session::get('userID');
                 $encuentro->save();
             }
             if ($noEquipos == 4) {
                 $encuentro = new EncuentroModel;
                 $encuentro->fk_equipo1 = $equipos[1]->idequipo;
                 $encuentro->fk_equipo2 = $equipos[2]->idequipo;
                 $encuentro->fk_grupo = $equipos[2]->grupo;
                 $encuentro->fk_usuario = Session::get('userID');
                 $encuentro->save();

                 $encuentro = new EncuentroModel;
                 $encuentro->fk_equipo1 = $equipos[1]->idequipo;
                 $encuentro->fk_equipo2 = $equipos[3]->idequipo;
                 $encuentro->fk_grupo = $equipos[2]->grupo;
                 $encuentro->fk_usuario = Session::get('userID');
                 $encuentro->save();

                 $encuentro = new EncuentroModel;
                 $encuentro->fk_equipo1 = $equipos[2]->idequipo;
                 $encuentro->fk_equipo2 = $equipos[3]->idequipo;
                 $encuentro->fk_grupo = $equipos[2]->grupo;
                 $encuentro->fk_usuario = Session::get('userID');
                 $encuentro->save();
             }
         }else{
               if ($noEquipos != 0) {
                   Session::flash('error_message', 'No pueden existir mas de 5 equipos por grupo');
               }
         }
     }



     return redirect('/registro_encuentros');
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
    public function update(Request $request)
    {

          $encuentro = EncuentroModel::find($request->id_encuentro);

          $encuentro->fk_cancha = $request->cancha;

          $encuentro->fecha = $request->date;

          $encuentro->fk_usuario = $request->arbitro;

          $encuentro->fk_servicio_medico = $request->medico;

          $encuentro->resultado = $request->res1;

          $encuentro->resultado2 = $request->res2;

          $encuentro->save();

          return redirect('/registro_encuentros');
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
