import { Component, OnInit } from '@angular/core';
import { BloodService } from '../blood.service';
import { FormGroup, FormControl } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { subscribeOn } from 'rxjs';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  //loginUserData = { }
  constructor(private blood: BloodService) { }
  loginPage = new FormGroup({
    username:new FormControl( '' ),
    password:new FormControl( '' )
  });

  ngOnInit(): void {
    this.getAllData();
    console.log(this.loginPage)
  }
  //get all data from staff
  getAllData(){
    this.blood.getstaffdata().subscribe((res )=>{
      console.log(res)
    })
  }
  //keyword specifies that a variable's value is constant
  loginUser(){
    const loginPage = this.loginPage.value;
    this.blood.loginUser(loginPage.username,loginPage.password).subscribe(
      res => console.log(res),
      err => console.log(err)
    )

      //console.log(this.loginUserData)
}
}
