import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LayoutComponent } from './layout/layout.component';
import { HeaderComponent } from './layout/header/header.component';
import { FooterComponent } from './layout/footer/footer.component';
import { HomeComponent } from './home/home.component';
import { AboutComponent } from './about/about.component';
import { ServiceComponent } from './service/service.component';
import { BlogComponent } from './blog/blog.component';
import { RegisterComponent } from './register/register.component';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ToastrModule } from 'ngx-toastr';
import { NgxSpinnerModule } from "ngx-spinner";
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AngularFireModule } from '@angular/fire/compat';
import { AngularFireDatabaseModule } from '@angular/fire/compat/database';
import { AngularFirestoreModule } from '@angular/fire/compat/firestore';
import { AngularFireStorageModule } from '@angular/fire/compat/storage';
import { environment } from '../environments/environment';
import { LoginComponent } from './login/login.component';
import { AddeventComponent } from './events/addevent/addevent.component';
import { ManageeventComponent } from './events/manageevent/manageevent.component';
import { UpdateeventComponent } from './events/updateevent/updateevent.component';
import { AddtypeComponent } from './ticketType/addtype/addtype.component';
import { UpdatetypeComponent } from './ticketType/updatetype/updatetype.component';
import { ManagetypeComponent } from './ticketType/managetype/managetype.component';
import { AddticketComponent } from './tickets/addticket/addticket.component';
import { UpdateticketComponent } from './tickets/updateticket/updateticket.component';
import { ManageticketComponent } from './tickets/manageticket/manageticket.component';
import { AddbookingComponent } from './bookings/addbooking/addbooking.component';
import { ManagebookingComponent } from './bookings/managebooking/managebooking.component';
import { ViewbookingComponent } from './bookings/viewbooking/viewbooking.component';
import { ErrorComponent } from './error/error.component';
import { EventsComponent } from './events/events.component';
import { TicketsComponent } from './tickets/tickets.component';
import { BookingstatusComponent } from './bookings/bookingstatus/bookingstatus.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { ShoweventComponent } from './showevent/showevent.component';
import { ShowetictypeComponent } from './showetictype/showetictype.component';
import { ShoweticketComponent } from './showeticket/showeticket.component';
import { ViewuserComponent } from './viewuser/viewuser.component';

@NgModule({
  declarations: [
    AppComponent,
    LayoutComponent,
    HeaderComponent,
    FooterComponent,
    HomeComponent,
    AboutComponent,
    ServiceComponent,
    BlogComponent,
    RegisterComponent,
    LoginComponent,
    AddeventComponent,
    ManageeventComponent,
    UpdateeventComponent,
    AddtypeComponent,
    UpdatetypeComponent,
    ManagetypeComponent,
    AddticketComponent,
    UpdateticketComponent,
    ManageticketComponent,
    AddbookingComponent,
    ManagebookingComponent,
    ViewbookingComponent,
    ErrorComponent,
    EventsComponent,
    TicketsComponent,
    BookingstatusComponent,
    DashboardComponent,
    ShoweventComponent,
    ShowetictypeComponent,
    ShoweticketComponent,
    ViewuserComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule, // required animations module
    ToastrModule.forRoot(),
    NgxSpinnerModule,
    AngularFireModule.initializeApp(environment.firebase),
    AngularFireDatabaseModule,
    AngularFirestoreModule,
    AngularFireStorageModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
