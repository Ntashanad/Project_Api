import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';
import { BloodService } from '../blood.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-adddonor',
  templateUrl: './adddonor.component.html',
  styleUrls: ['./adddonor.component.css']
})
export class AdddonorComponent implements OnInit {

//Tracks the name of the FormGroup bound to the directive.
  constructor(private blood:BloodService, private router: Router) {}
    addDonor = new FormGroup({
    name:new FormControl( '' ),
    date_of_birth: new FormControl( '' ),
    gender:new FormControl( '' ),
    address:new FormControl( '' ),
    contact_number:new FormControl( '' ),
    email_add:new FormControl( '' ),
    bloods_id:new FormControl( '' )
  });
  message:boolean=false;

  ngOnInit(): void {
  }
  //Method to save data that call from ngsubmit
  SaveData(){
    //console.log(this.addDonor.value);
    this.blood.saveDonorData(this.addDonor.value).subscribe((res)=>{
    console.log(res);
    this.message=true;
    this.addDonor.reset({});
  });
}
//
removeMessage(){
  this.message=false;
  this.router.navigate(['adddonor']);
}

}
