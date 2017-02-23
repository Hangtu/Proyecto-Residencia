import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import {ArbProtesta1Page} from '../arb-protesta-1/arb-protesta-1';
import { Http } from '@angular/http';

/*
  Generated class for the ArbProtestaPage page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
  */
  @Component({
  	templateUrl: 'build/pages/arb-protesta/arb-protesta.html',
  })
  export class ArbProtestaPage {

  	public items = [];

  	constructor(private navCtrl: NavController ,public http: Http) {

    var url = 'http://localhost:8000/ionic/lista_partidos';
      this.http.get(url).subscribe((data) => { 
      this.items = data.json();
      console.log(this.items);
    });

  	}

  	  itemSelected(item){
  	   this.navCtrl.push(ArbProtesta1Page,{
  	   	 item:item
  	   });
    }

}
