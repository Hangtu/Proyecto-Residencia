import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import {AccesoPage} from '../acceso/acceso';
import {TecnicoNotificacionesPage} from '../tecnico-notificaciones/tecnico-notificaciones';
import { LocalNotifications } from 'ionic-native';

/*
  Generated class for the TecnicoProtestaPage page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  templateUrl: 'build/pages/tecnico-protesta/tecnico-protesta.html',
})
export class TecnicoProtestaPage {

	public notificaciones = 3;

  constructor(private navCtrl: NavController) {
      this.schedule();
  }


  	nextPage(opc){

  		if(opc == '2') {
  			this.navCtrl.push(TecnicoNotificacionesPage, {
  				item: '1'
  			});
  		}

  	}

   	log_out(){
   		this.navCtrl.setRoot(AccesoPage);
   	}

  schedule() {
    LocalNotifications.schedule({
      title: "Cottap",
      text: "Resultados De Los Juegos",
      at: new Date(new Date().getTime() + 1 * 1000),
      sound: null
    });
  }

}
