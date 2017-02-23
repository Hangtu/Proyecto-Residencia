<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuentroModel extends Model{
	protected $table  = 'encuentro';
	protected $primaryKey = 'idencuentro';


	public function equipo1(){
		return $this->hasOne('App\EquipoModel','idequipo','fk_equipo1');
	}

	public function equipo2(){
		return $this->hasOne('App\EquipoModel','idequipo','fk_equipo2');
	}

	public function cancha(){
		return $this->hasOne('App\CanchaModel','idcancha','fk_cancha');
	}

	public function servicio_medico(){
		return $this->hasOne('App\MedicoModel','idserviciomedico','fk_servicio_medico');
	}
}
