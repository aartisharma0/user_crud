import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LayoutComponent } from './layout/layout.component';
import { HomeComponent } from './home/home.component';
import { AboutComponent } from './about/about.component';
import { LoginformUComponent } from './loginform-u/loginform-u.component';
import { RegisterUserComponent } from './register-user/register-user.component';
import { AddcategoryComponent } from './category/addcategory/addcategory.component';
import { ManagecategoryComponent } from './category/managecategory/managecategory.component';
import { UpdatecategoryComponent } from './category/updatecategory/updatecategory.component';
import { AddserviceComponent } from './service/addservice/addservice.component';
import { ManageserviceComponent } from './service/manageservice/manageservice.component';
import { UpdateserviceComponent } from './service/updateservice/updateservice.component';
import { AddexpertComponent } from './expert/addexpert/addexpert.component';
import { ManageexpertComponent } from './expert/manageexpert/manageexpert.component';
import { UpdateexpertComponent } from './expert/updateexpert/updateexpert.component';
import { AddcontactComponent } from './contact/addcontact/addcontact.component';
import { ViewcontactComponent } from './contact/viewcontact/viewcontact.component';
import { AddbookingComponent } from './booking/addbooking/addbooking.component';
import { ViewbookingComponent } from './booking/viewbooking/viewbooking.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { BookingstatusComponent } from './booking/bookingstatus/bookingstatus.component';
import { CategoriesComponent } from './categories/categories.component';
import { ServicesComponent } from './services/services.component';
import { ExpertsComponent } from './experts/experts.component';
import { ErrorComponent } from './error/error.component';
import { UserauthGuard } from './user_auth/userauth.guard';

const routes: Routes = [
  {
    path: '', redirectTo: 'layout/home', pathMatch: 'full'
  },
  {
    path: 'layout', component: LayoutComponent,
    children: [
      {
        path: 'register', component: RegisterUserComponent
      },
      {
        path: 'login', component: LoginformUComponent
      },
      {
        path: 'home', component: HomeComponent 
      },
      {
        path: 'dashboard', component: DashboardComponent
      },
      {
        path: 'about', component: AboutComponent
      },
      {
        path: 'dashboard', component: LoginformUComponent
      },
      {
        path: 'addcategory', component: AddcategoryComponent
      },
      {
        path: 'managecategory', component: ManagecategoryComponent
      },
      {
        path: 'updatecategory/:id', component: UpdatecategoryComponent
      },
      
      {
        path: 'addservice', component: AddserviceComponent
      },
      {
        path: 'manageservice', component: ManageserviceComponent
      },
      {
        path: 'updateservice/:id', component: UpdateserviceComponent
      },
      {
        path: 'addexpert', component: AddexpertComponent
      },
      {
        path: 'manageexpert', component: ManageexpertComponent
      },
      {
        path: 'updateexpert/:id', component: UpdateexpertComponent
      },
      {
        path: 'addcontact', component: AddcontactComponent
      },
      {
        path: 'managecontact', component: ViewcontactComponent
      },
      {
        path: 'addbooking/:category/:service', component:AddbookingComponent
      },
      {
        path: 'managebooking', component: ViewbookingComponent
      },
      {
        path: 'bookingstatus', component: BookingstatusComponent
      },
      {
        path: 'categories', component: CategoriesComponent
      },
      {
        path: 'services/:category', component: ServicesComponent
      },
      {
        path: 'experts', component: ExpertsComponent
      },
    ]
  },
  {
    path: '**', component: ErrorComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
