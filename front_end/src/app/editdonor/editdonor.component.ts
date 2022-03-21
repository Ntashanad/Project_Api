import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';
import { BloodService } from '../blood.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-editdonor',
  templateUrl: './editdonor.component.html',
  styleUrls: ['./editdonor.component.css']
})
export class EditdonorComponent implements OnInit {
  //Tracks the name of the FormGroup bound to the directive.
  constructor(private blood:BloodService, private router: ActivatedRoute) { }
    editDonor = new FormGroup({
    name:new FormControl( '' ),
    date_of_birth: new FormControl( '' ),
    gender:new FormControl( '' ),
    address:new FormControl( '' ),
    contact_number:new FormControl( '' ),
    email_add:new FormControl( '' ),
    bloods_id:new FormControl( '' )
  });
  message:boolean=false;

  //to payload data on the field form
  ngOnInit(): void {
    //console.log( this.router.snapshot.params['donor_id']);
    this.blood.getDonorById( this.router.snapshot.params['donor_id']).subscribe((result: any)=>{
      console.log(result);
        this.editDonor = new FormGroup({
        name:new FormControl( result['name'] ),
        date_of_birth: new FormControl( result['date_of_birth'] ),
        gender:new FormControl( result['gender'] ),
        address:new FormControl( result['address'] ),
        contact_number:new FormControl( result['contact_number'] ),
        email_add:new FormControl( result['email_add'] ),
        bloods_id:new FormControl( result['bloods_id'] )
      });
    });
  }

  //when click submit button it will save the data and popup the successful message
  UpdateData(){
    //console.log(this.editDonor.value);
    this.blood.updateDonorData(this.router.snapshot.params['donor_id'], this.editDonor.value).subscribe((result)=>{
      //console.log(result);
      this.message=true;
    })
}
removeMessage(){
  this.message=false;
}

}
