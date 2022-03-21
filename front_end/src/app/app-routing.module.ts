import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { DonorlistComponent } from './donorlist/donorlist.component';
import { AdddonorComponent } from './adddonor/adddonor.component';
import { LoginComponent } from './login/login.component';
import { AboutComponent } from './about/about.component';
import { EditdonorComponent } from './editdonor/editdonor.component';
import { FaqComponent } from './faq/faq.component';
import { NavbarComponent } from './navbar/navbar.component';

const routes: Routes = [

  {path: 'login', component: LoginComponent},
  {path: '', redirectTo: '/login', pathMatch: 'full' },
  {path:'home', component: HomeComponent},
  {path: 'navbar', component: NavbarComponent},
  {path: 'donorlist', component: DonorlistComponent},
  {path: 'adddonor', component: AdddonorComponent},
  {path: 'editdonor/:donor_id', component: EditdonorComponent},
  {path: 'about', component: AboutComponent},
  {path: 'faq', component: FaqComponent}
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
