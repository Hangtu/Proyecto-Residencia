import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { LocalNotifications } from 'ionic-native';

/*
  Generated class for the TecnicoNotificacionesPage page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  templateUrl: 'build/pages/tecnico-notificaciones/tecnico-notificaciones.html',
})
export class TecnicoNotificacionesPage {

	public resultados = [
	{'resultados':'Equipo1 10 - 0 Equipo 2'},
	{'resultados':'Equipo3 10 - 0 Equipo 4'},
	{'resultados':'Equipo5 10 - 0 Equipo 6'},
	{'resultados':'Equipo7 10 - 0 Equipo 8'},
	];

	public protestas = [
	{'protestas':'Equipo1 vs Equipo 2'},
	{'protestas':'Equipo3 vs Equipo 4'},
	{'protestas':'Equipo5 vs Equipo 6'},
	{'protestas':'Equipo7 vs Equipo 8'},
	];

  constructor(private navCtrl: NavController) {
      this.schedule();
  }


  	schedule() {
		LocalNotifications.schedule({
			title: "Cottap",
			text: "Nueva Notificacion",
			at: new Date(new Date().getTime() + 5 * 1000),
			sound: null
		});
	}

}
