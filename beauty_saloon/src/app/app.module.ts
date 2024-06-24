import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LayoutComponent } from './layout/layout.component';
import { AboutComponent } from './about/about.component';
import { HomeComponent } from './home/home.component';
import { ContactComponent } from './contact/contact.component';
import { HeaderComponent } from './layout/header/header.component';
import { FooterComponent } from './layout/footer/footer.component';
import{FormsModule,ReactiveFormsModule} from '@angular/forms';
import { LoginformUComponent } from './loginform-u/loginform-u.component';
import { RegisterUserComponent } from './register-user/register-user.component';

import { AngularFireModule } from '@angular/fire/compat';
import { AngularFireDatabaseModule } from '@angular/fire/compat/database';
import { AngularFirestoreModule } from '@angular/fire/compat/firestore';
import { AngularFireStorageModule } from '@angular/fire/compat/storage';
import { environment } from '../environments/environment';
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
// Import library module
import { NgxSpinnerModule } from "ngx-spinner";
import { ToastrModule } from 'ngx-toastr';
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
import { CategoriesComponent } from './categories/categories.component';
import { ServicesComponent } from './services/services.component';
import { BookingstatusComponent } from './booking/bookingstatus/bookingstatus.component';
import { ExpertsComponent } from './experts/experts.component';
import { ErrorComponent } from './error/error.component';

@NgModule({
  declarations: [
    AppComponent,
    LayoutComponent,
    AboutComponent,
    HomeComponent,
    ContactComponent,
    HeaderComponent,
    FooterComponent,
    LoginformUComponent,
    RegisterUserComponent,
    AddcategoryComponent,
    ManagecategoryComponent,
    UpdatecategoryComponent,
    AddserviceComponent,
    ManageserviceComponent,
    UpdateserviceComponent,
    AddexpertComponent,
    ManageexpertComponent,
    UpdateexpertComponent,
    AddcontactComponent,
    ViewcontactComponent,
    AddbookingComponent,
    ViewbookingComponent,
    DashboardComponent,
    CategoriesComponent,
    ServicesComponent,
    BookingstatusComponent,
    ExpertsComponent,
    ErrorComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    AngularFireModule.initializeApp(environment.firebase),
    AngularFireDatabaseModule,
    AngularFirestoreModule,
    AngularFireStorageModule,
    FormsModule,
    ReactiveFormsModule,
    BrowserAnimationsModule,
    NgxSpinnerModule,
    ToastrModule.forRoot(), // ToastrModule added
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
