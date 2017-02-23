import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import {ArbitroProtestaPage} from '../arbitro-protesta/arbitro-protesta';
import {TecnicoProtestaPage} from '../tecnico-protesta/tecnico-protesta';

/*
  Generated class for the AccesoPage page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  templateUrl: 'build/pages/acceso/acceso.html',
})
export class AccesoPage {

 
  public user = {'email':'arbitro@gmail.com','password':'1234'};

  constructor(private navCtrl: NavController) {

  }

  sendForm(user){

    if(user.email == 'tecnico@gmail.com') {
      this.navCtrl.setRoot(TecnicoProtestaPage);
      console.log(user);
    }

    if(user.email == 'arbitro@gmail.com') {
      this.navCtrl.setRoot(ArbitroProtestaPage);
      console.log(user);
    }

  }

}
