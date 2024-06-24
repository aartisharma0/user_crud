import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { map } from 'rxjs';
import { Booking } from 'src/app/model/booking/booking.model';
import { BookingService } from 'src/app/shared/booking/booking.service';
import { ServicesService } from 'src/app/shared/services/services.service';
import { Services } from 'src/app/model/services/services.model';
import { UserauthService } from 'src/app/shared/userauth/userauth.service';

@Component({
  selector: 'app-addbooking',
  templateUrl: './addbooking.component.html',
  styleUrls: ['./addbooking.component.css']
})
export class AddbookingComponent {
  booking: Booking = new Booking()
  selectedServicePrice: number | any;
  services?: Services[]

  form = {
    categoryName: '',
    serviceName: '',
    customerName: '',
    price: '',
    bookingDate: '',
    bookingStatus: '',
  }

  constructor(private activatedroute: ActivatedRoute, private toastr: ToastrService, private spinner: NgxSpinnerService, private bookingservice: BookingService, private router: Router, private productservice: ServicesService,private user:UserauthService) { }

  cname: any
  psname: any

  ngOnInit(): void {
    this.cname = this.activatedroute.snapshot.paramMap.get("category")
    this.psname = this.activatedroute.snapshot.paramMap.get("service")
    this.form.categoryName = this.cname
    this.form.serviceName = this.psname
    this.getData()
    this.getuser()
  }
  productdata: any
  getData() {
    this.spinner.show()
    this.productservice.getProductByservice(this.form.serviceName).snapshotChanges().pipe(
      map(changes => {
        return changes.map((c: any) => {
          return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
        })
      })
      ).subscribe((resultdata: any) => {
        this.spinner.hide()
        this.productdata = resultdata
        this.form.price = this.productdata[0].price
        // console.log(this.productdata)
    })
  }
  userdata:any
getuser(){
  this.spinner.show()
    this.user.getUserByUid(localStorage.getItem("uid")).snapshotChanges().pipe(
      map(changes => {
        return changes.map((c: any) => {
          return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
        })
      })
      ).subscribe((resultdata: any) => {
        this.spinner.hide()
        this.userdata = resultdata
        this.form.customerName = this.userdata[0].name
    })
}
  submit() {
    this.spinner.show()
    this.booking.uid = localStorage.getItem("uid")
    this.booking.categoryName = this.form.categoryName
    this.booking.serviceName = this.form.serviceName
    this.booking.customerName = this.form.customerName
    this.booking.price = this.form.price
    this.booking.bookingDate = this.form.bookingDate
    this.booking.bookingStatus = 'Pending'
    this.booking.created = Date.now()

    // console.log(this.booking)
    // return 
    this.bookingservice.create(this.booking).then(() => {
      this.spinner.hide()
      this.toastr.success("Appointment Booked Successfully!!!")
      this.router.navigateByUrl("/layout/bookingstatus")
    })
  }

}
