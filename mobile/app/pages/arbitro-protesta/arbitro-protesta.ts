import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import {AccesoPage} from '../acceso/acceso';

import {ArbCapturaPage} from '../arb-captura/arb-captura';
import {ArbNotificacionesPage} from '../arb-notificaciones/arb-notificaciones';
import {ArbProtestaPage} from '../arb-protesta/arb-protesta';
import { LocalNotifications } from 'ionic-native';

/*
  Generated class for the ArbitroProtestaPage page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
  */
  @Component({
  	templateUrl: 'build/pages/arbitro-protesta/arbitro-protesta.html',
  })
  export class ArbitroProtestaPage {

    public notificaciones = 2;

  	constructor(private navCtrl: NavController) {
        this.schedule();
  	}

  	nextPage(opc){
  		if(opc == '1') {
  			this.navCtrl.push(ArbCapturaPage, {
  				item: '1'
  			});
  		}
  		if(opc == '2') {
  			this.navCtrl.push(ArbNotificacionesPage, {
  				item: '1'
  			});
  		}
  		if(opc == '3') {
  			this.navCtrl.push(ArbProtestaPage, {
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
      text: "Tiene nuevos partidos por aceptar",
      at: new Date(new Date().getTime() + 1 * 1000),
      sound: null
    });
  }



   }
