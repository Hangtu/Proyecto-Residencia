import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { LocalNotifications } from 'ionic-native';

/*
  Generated class for the ArbNotificacionesPage page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  templateUrl: 'build/pages/arb-notificaciones/arb-notificaciones.html',
})
export class ArbNotificacionesPage {

  constructor(private navCtrl: NavController) {
     //this.schedule();
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
