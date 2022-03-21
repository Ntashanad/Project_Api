import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './navbar/navbar.component';
import { AboutComponent } from './about/about.component';
import { HomeComponent } from './home/home.component';
import { DonorlistComponent } from './donorlist/donorlist.component';
import { LoginComponent } from './login/login.component';
import { AdddonorComponent } from './adddonor/adddonor.component';
import { HttpClientModule } from '@angular/common/http';
import { BloodService } from './blood.service';
import { ReactiveFormsModule} from '@angular/forms';
import { EditdonorComponent } from './editdonor/editdonor.component';
import { FaqComponent } from './faq/faq.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    AboutComponent,
    HomeComponent,
    DonorlistComponent,
    LoginComponent,
    AdddonorComponent,
    EditdonorComponent,
    FaqComponent

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ReactiveFormsModule
  ],
  providers: [BloodService],
  bootstrap: [AppComponent]
})
export class AppModule { }
