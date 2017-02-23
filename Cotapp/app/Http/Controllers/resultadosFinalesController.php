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

class resultadosFinalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $grupos = GrupoModel::all();



        foreach ($grupos as $key => $grupo) {
                
               $equipos = EquipoModel::where('grupo', $grupo->idgrupo)->get();

               $grupos[$key]['equipos'] = $equipos;

               foreach ($equipos as $key2 => $equipo) {
                    $resultados =  EncuentroModel::where('fk_equipo1',$equipo->idequipo)->orWhere('fk_equipo2',$equipo->idequipo)->get();
                    
                    //SACAR CUENTAS DE LOS RESULTADOS  DE LOS ENCUENTROS DE ESE EQUIPO
                    $JG = 0;
                    $JP = 0;

                    $PF = 0;
                    $PC = 0;

                    $COS = 0;
                    foreach ($resultados as $key3 => $resultado) {
                            
                       if ($resultado->fk_equipo1 == $equipo->idequipo) { // SI ESTA EN LA POSICION 1 LE PERTENE EL RESULTADO 1
                           
                           if ($resultado->resultado > $resultado->resultado2) {
                                $JG++;
                                $PF +=$resultado->resultado;
                                $PC +=$resultado->resultado2;
                           }else{
                                $JP++;
                                $PF +=$resultado->resultado;
                                $PC +=$resultado->resultado2;
                           }

                       }

                        if ($resultado->fk_equipo2 == $equipo->idequipo) { // SI ESTA EN LA POSICION 2 LE PERTENE EL RESULTADO 2
                           
                           if ($resultado->resultado2 > $resultado->resultado) {
                                $JG++;
                                $PF +=$resultado->resultad2;
                                $PC +=$resultado->resultado;
                           }else{
                                $JP++;
                                $PF +=$resultado->resultado2;
                                $PC +=$resultado->resultado;
                           }
                       }

                    }

                 if( $PF != '0' && $PC != '0'){ // SE SACA EL COS
                    $COS = ($PF / $PC);
                 }

                  

                  $obj = (object) array(
                   'JG' => $JG,
                   'JP' => $JP,
                   'PF' => $PF,
                   'PC' => $PC,
                   'COS' => $COS,
                   'LUGAR' => $COS);

                    $grupos[$key]['equipos'][$key2]['resultados'] =  $obj;
               }
          }



         return view('resultados_finales')->with('grupos',$grupos)->with('test',$grupos);
    }

    /**
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
