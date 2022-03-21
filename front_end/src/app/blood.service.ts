import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})

export class BloodService {
  //to get data and communicate with remote server over HTTP
  constructor(private http:HttpClient) { }
  url = "http://localhost:8888/donors"
  urlLogin = "http://localhost:8888/staff"

  //to get all donors data
  getDepList(): Observable<any>{
    return this.http.get(this.url);
  }
  //post metohd to save data
  saveDonorData(data: any){
    console.log(data);
    return this.http.post(this.url, data);
  }
  //delete data by id
  deleteDonor(donor_id:any){
    console.log(donor_id);
    return this.http.delete(this.url + '/' + donor_id);
  }
  getDonorById(donor_id: number){
    //console.log(donor_id);
    return this.http.get(this.url + '/' + donor_id);
  }
  // put method to update donor data by id
  updateDonorData(donor_id:number, data:any){
    return this.http.put(this.url + '/' + donor_id, data);
  }
  // to get all staff data
  getstaffdata(): Observable<any>{
    return this.http.get(this.urlLogin);
  }
  //post method to login using username and password
  loginUser(username: any, password:any){
    console.log(username, password);
    return this.http.post(this.urlLogin, username, password);
  }
}

