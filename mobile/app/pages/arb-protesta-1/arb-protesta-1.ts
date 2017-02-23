import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Http } from '@angular/http';

import {ToastController } from 'ionic-angular';

/*
  Generated class for the ArbProtesta1Page page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  templateUrl: 'build/pages/arb-protesta-1/arb-protesta-1.html',
})
export class ArbProtesta1Page {

protesta: any;

  constructor(private navCtrl: NavController, protected http: Http, private toastCtrl: ToastController) {
 
        this.protesta = {};
        this.protesta.titulo = "";
        this.protesta.descripcion = "";

  }

  enviarProtesta(http: Http){



      let datas = JSON.stringify({'titulo':this.protesta.titulo,
        'descripcion':this.protesta.descripcion
      });
      var url = 'http://localhost:8000/ionic/crear_protesta/'+datas;
      this.http.post(url,datas).subscribe((data) => { 
      let items = data.json();
      console.log(items[0]);
       });

       let toast = this.toastCtrl.create({
      message: 'Se guardaron los datos',
      duration: 3000
    });

      toast.present();

}

}
