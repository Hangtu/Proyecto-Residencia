import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { NavParams } from 'ionic-angular';

declare var google: any;
/*
  Generated class for the Home1Page page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  templateUrl: 'build/pages/home-1/home-1.html',
})
export class Home1Page {

  public map;

  private cordenadas;
  private fecha;

  constructor(private navCtrl: NavController, private navParams: NavParams) {
      this.cordenadas = navParams.get('cordenadas');
      this.fecha = navParams.get('fecha');
  }

  ionViewLoaded(){
    this.loadMap();
    this.addMarker();
  }


  loadMap(){

    let cord = this.cordenadas.split(',');

    console.log(cord);

  	let latLng = new google.maps.LatLng(parseFloat(cord[0]),parseFloat(cord[1]));
 
    let mapOptions = {

      center: {lat: parseFloat(cord[0]), lng: parseFloat(cord[1])},
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    this.map = new google.maps.Map(document.getElementById("map"), mapOptions);
  }


  addMarker(){
 
  let marker = new google.maps.Marker({
    map: this.map,
    animation: google.maps.Animation.DROP,
    position: this.map.getCenter()
  });
  
  let content = "<h4>"+this.fecha+"</h4>";          
 
  this.addInfoWindow(marker, content);
}


addInfoWindow(marker, content){
 
  let infoWindow = new google.maps.InfoWindow({
    content: content
  });
 
  google.maps.event.addListener(marker, 'click', () => {
    infoWindow.open(this.map, marker);
  });
 
}

}
