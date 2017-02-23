import {Component} from '@angular/core';
import {NavController} from 'ionic-angular';
import {ToastController } from 'ionic-angular';
import { LocalNotifications } from 'ionic-native';
import {Home1Page} from '../home-1/home-1';
import { Http } from '@angular/http';

import { EmailComposer } from 'ionic-native';


@Component({
	templateUrl: 'build/pages/home/home.html'
})
export class HomePage {

	public items = [];



	
	constructor(private navCtrl: NavController, private toastCtrl: ToastController, public http: Http) {



		//this.schedule();

		var url = 'http://localhost:8000/ionic/lista_partidos';
      this.http.get(url).subscribe((data) => { 
      this.items = data.json();
      console.log(this.items);
    });

		let email = {
			to: 'hangtuwlf@gmail.com',
			cc: 'hangtuwlf@gmail.com',
			bcc: ['john@doe.com', 'hangtuwlf@gmail.com'],
			subject: 'Cordova Icons',
			body: 'How are you? Nice greetings from Leipzig',
			isHtml: true
		};

		EmailComposer.open(email);
	}

	itemSelected(item,encuentro){
		let toast = this.toastCtrl.create({
			message: 'No hay informacion disponible para este partido',
			duration: 3000
		});
		//toast.present();

    

        if(item == null) {
        	let toast = this.toastCtrl.create({
			message: 'No hay informacion disponible para este partido',
			duration: 3000
		 });
		toast.present();
        }else{

		this.navCtrl.push(Home1Page,{
			cordenadas:item.cordenadas,
			fecha:encuentro.fecha
		});

        }


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

