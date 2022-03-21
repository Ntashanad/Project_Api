import { Component, OnInit } from '@angular/core';
import { BloodService } from '../blood.service';

@Component({
  selector: 'app-donorlist',
  templateUrl: './donorlist.component.html',
  styleUrls: ['./donorlist.component.css']
})
export class DonorlistComponent implements OnInit {

  listData:any = {};

  constructor(private blood:BloodService) { }
  deleteMessage:boolean=false;

  ngOnInit(): void {
    this.getAllData();
  }

  getAllData()
  {
    this.blood.getDepList().subscribe((res)=>{
      console.log(res,"res==");
      this.listData = res.data;
    })
  }
  deleteDonor(donor_id: any){
    //console.log(donor_id);
    this.blood.deleteDonor(donor_id).subscribe((result)=>{
      //console.log(result);
      this.ngOnInit();
      //if(confirm("Are you sure to delete " + donor_id)) {
        console.log(result);
        this.deleteMessage=true;
      //}
    });
  }
  confirmDelete(){
    this.deleteMessage=false;
  }
}
