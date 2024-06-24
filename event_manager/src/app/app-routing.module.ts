import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LayoutComponent } from './layout/layout.component';
import { HomeComponent } from './home/home.component';
import { AboutComponent } from './about/about.component';
import { ServiceComponent } from './service/service.component';
import { BlogComponent } from './blog/blog.component';
import { RegisterComponent } from './register/register.component';
import { LoginComponent } from './login/login.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { AddeventComponent } from './events/addevent/addevent.component';
import { UpdateeventComponent } from './events/updateevent/updateevent.component';
import { ManageeventComponent } from './events/manageevent/manageevent.component';
import { ManagetypeComponent } from './ticketType/managetype/managetype.component';
import { UpdatetypeComponent } from './ticketType/updatetype/updatetype.component';
import { AddtypeComponent } from './ticketType/addtype/addtype.component';
import { AddticketComponent } from './tickets/addticket/addticket.component';
import { UpdateticketComponent } from './tickets/updateticket/updateticket.component';
import { ManageticketComponent } from './tickets/manageticket/manageticket.component';
import { AddbookingComponent } from './bookings/addbooking/addbooking.component';
import { ManagebookingComponent } from './bookings/managebooking/managebooking.component';
import { ViewbookingComponent } from './bookings/viewbooking/viewbooking.component';
import { BookingstatusComponent } from './bookings/bookingstatus/bookingstatus.component';
import { ViewuserComponent } from './viewuser/viewuser.component';
import { ShoweventComponent } from './showevent/showevent.component';
import { ShowetictypeComponent } from './showetictype/showetictype.component';
import { ShoweticketComponent } from './showeticket/showeticket.component';

const routes: Routes = [
  {
    path:'',redirectTo:'/layout/home',pathMatch:'full'
  },
  {
    path:'layout',component:LayoutComponent,
    children:[
      {
        path:'home',component:HomeComponent,
      },
      {
        path:'about',component:AboutComponent,
      },
      {
        path:'register',component:RegisterComponent,
      },
      {
        path:'login',component:LoginComponent,
      },
      {
        path:'dashboard',component:DashboardComponent,
      },
      {
        path:'addevent',component:AddeventComponent,
      },
      {
        path:'updateevent/:id',component:UpdateeventComponent,
      },
      {
        path:'manageevent',component:ManageeventComponent,
      },
      {
        path:'addtype',component:AddtypeComponent,
      },
      {
        path:'updatetype/:id',component:UpdatetypeComponent,
      },
      {
        path:'managetype',component:ManagetypeComponent,
      },
      {
        path:'addticket',component:AddticketComponent,
      },
      {
        path:'updateticket/:id',component:UpdateticketComponent,
      },
      {
        path:'manageticket',component:ManageticketComponent,
      },
      {
        path:'addbooking/:ticket',component:AddbookingComponent,
      },
      {
        path:'viewbooking',component:ViewbookingComponent,
      },
      {
        path:'managebooking',component:ManagebookingComponent,
      },
      {
        path:'bookingstatus',component:BookingstatusComponent,
      },
      {
        path:'viewuser',component:ViewuserComponent,
      },
      {
        path:'showevents',component:ShoweventComponent,
      },
      {
        path:'showtictype/:eventName',component:ShowetictypeComponent,
      },
      {
        path:'showticket/:tickettype/:eventName',component:ShoweticketComponent,
      },
      {
        path:'service',component:ServiceComponent,
      },
      {
        path:'blog',component:BlogComponent,
      },
      
    ]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
