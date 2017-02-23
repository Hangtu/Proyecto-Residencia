import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { NavParams } from 'ionic-angular';
import { Http } from '@angular/http';
import { AlertController } from 'ionic-angular';
import {ToastController } from 'ionic-angular';


import {ArbitroProtestaPage} from '../arbitro-protesta/arbitro-protesta';

@Component({
  templateUrl: 'build/pages/arb-captura-1/arb-captura-1.html',
})
export class ArbCaptura1Page {
   
  public partido;
  public equipo = {};
  equipos: any;

  private datosEquipo;

  constructor(public navCtrl: NavController, private navParams: NavParams, public http: Http, public alertCtrl: AlertController, private toastCtrl: ToastController) {
     this.partido = navParams.get('item');
      this.datosEquipo = navParams.get('equipo');
   

        this.equipos = {};
        this.equipos.visitante = "1";
        this.equipos.local = "1";

  }

  enviarResultado(){
    
    console.log(this.equipos);

    let prompt = this.alertCtrl.create({
      title: 'Enviar Resultados',
      message: "¿Esta seguro que quiere enviar los resultados de este partido?",
      buttons: [
        {
          text: 'Cancelar',
          handler: data => {
            console.log('Cancel clicked');
          }
        },
        {
          text: 'Enviar',
          handler: data => {
            console.log('Saved clicked');

      let datas = JSON.stringify({'datos':"El resultado entre "+ this.datosEquipo.equipo1.nombre+" y "+this.datosEquipo.equipo2.nombre+" fue de "+this.equipos.visitante+" vs " +this.equipos.local,

        'usuario':'1'
        });
      var url = 'http://localhost:8000/ionic/enviar_resultados/'+datas;
      this.http.post(url,datas).subscribe((data) => { 
      let items = data.json();
      console.log(items[0]);
    });
    
      //this.navCtrl.push(ArbitroProtestaPage);
      //this.navCtrl.pop();
      let toast = this.toastCtrl.create({
      message: 'Se guardaron los datos',
      duration: 3000
    });

      toast.present();


          }
        }
      ]
    });
    
    prompt.present();

     

  }

}
