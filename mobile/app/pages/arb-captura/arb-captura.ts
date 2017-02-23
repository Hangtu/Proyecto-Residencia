import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { ArbCaptura1Page} from '../arb-captura-1/arb-captura-1';
import { Http } from '@angular/http';

/*
  Generated class for the ArbCapturaPage page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  templateUrl: 'build/pages/arb-captura/arb-captura.html',
})
export class ArbCapturaPage {

	/*public items = [
	{'partido':'Equipo1 vs Equipo 2'},
	{'partido':'Equipo3 vs Equipo 4'},
	{'partido':'Equipo5 vs Equipo 6'},
	{'partido':'Equipo7 vs Equipo 8'},
	];*/

  public items = [];


  constructor(private navCtrl: NavController, public http: Http) {

   var url = 'http://localhost:8000/ionic/lista_partidos';
      this.http.get(url).subscribe((data) => { 
      this.items = data.json();
      console.log(this.items);
    });

  }

  itemSelected(item,equipo){
  	   this.navCtrl.push(ArbCaptura1Page,{
  	   	 item:item,
         equipo:equipo
  	   });
  }

}
