<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\EncuentroModel;

use App\resultadosModel;

use App\ProtestaModel;

class ionicController extends Controller
{
	public function lista_partidos(){

	    $encuentros =   EncuentroModel::get();

	    foreach ($encuentros as $encuentro) {
            $encuentro->equipo1;
        }

        foreach ($encuentros as $encuentro) {
            $encuentro->equipo2;
        }

        foreach ($encuentros as $encuentro) {
            $encuentro->cancha;
        }

		return response()->json($encuentros);
	}

	


	public function guardarResultados($data){
		 $data = json_decode($data);

		 //echo $data->datos;


		 $resultados = new resultadosModel;

		 $resultados->descripcion = $data->datos;

		 $resultados->fk_user = $data->usuario;

		 $resultados->save();
	}

	public function crearProtesta($data){

		    $data = json_decode($data);

			$protesta = new ProtestaModel;

			$protesta->nombre = $data->titulo;

			$protesta->descripcion = $data->descripcion;

			$protesta->fk_usuario = 1;

			$protesta->save();

	}

}
