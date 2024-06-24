import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { map } from 'rxjs';
import { Booking } from 'src/app/models/booking/booking.model';
import { Tickets } from 'src/app/models/tickets/tickets.model';
import { BookingsService } from 'src/app/shared/bookings/bookings.service';
import { TicketsService } from 'src/app/shared/tickets/tickets.service';
import { UserauthService } from 'src/app/shared/userauth/userauth.service';

@Component({
  selector: 'app-addbooking',
  templateUrl: './addbooking.component.html',
  styleUrls: ['./addbooking.component.css']
})
export class AddbookingComponent implements OnInit {
  booking: Booking = new Booking()
  selectedServicePrice: number | any;
  services?: Tickets[]

  form = {
    uid:'', 
    userName:'',
    userEmail:'',
    userContact:'',
    userAddress:'',
    ticketType:'',
    ticketCode:'',
    eventName:'',
    eventDate:'',
    eventDescription:'',
    eventLocation:'',
    price:'',
    ticketName:'',
    ticketDescription:'',
    totalTickets:'',
    bookingDate:'',
    bookingStatus:'',
  }

  constructor(private activatedroute: ActivatedRoute, private toastr: ToastrService, private spinner: NgxSpinnerService, private bookingservice: BookingsService, private router: Router, private ticketservice: TicketsService,private user:UserauthService) { }

  ticketCode: any

  ngOnInit(): void {
    this.ticketCode = this.activatedroute.snapshot.paramMap.get("ticket")
    this.form.ticketCode = this.ticketCode
    this.getData()
    this.getuser()
    console.log(localStorage.getItem("uid"))
  }
  productdata: any
  getData() {
    this.spinner.show()
    this.ticketservice.getAllByTicketCode(this.form.ticketCode).snapshotChanges().pipe(
      map(changes => {
        return changes.map((c: any) => {
          return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
        })
      })
      ).subscribe((resultdata: any) => {
        this.spinner.hide()
        this.productdata = resultdata
        this.form.ticketType = this.productdata[0].ticketType
        this.form.ticketCode = this.productdata[0].ticketCode
        this.form.eventName = this.productdata[0].eventName
        this.form.eventDate = this.productdata[0].eventDate
        this.form.eventDescription = this.productdata[0].eventDescription
        this.form.eventLocation = this.productdata[0].eventLocation
        this.form.ticketName = this.productdata[0].ticketName
        this.form.ticketDescription = this.productdata[0].ticketDescription
        this.form.totalTickets = this.productdata[0].totalTickets
        this.form.price = this.productdata[0].price
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
        this.form.userName = this.userdata[0].name
        this.form.userEmail = this.userdata[0].email
        this.form.userContact = this.userdata[0].contact
        this.form.userAddress = this.userdata[0].address
    })
}
  submit() {
    this.spinner.show()
    this.booking.uid = localStorage.getItem("uid")
    this.booking.userName = this.form.userName
    this.booking.userEmail = this.form.userEmail
    this.booking.userContact = this.form.userContact
    this.booking.userAddress = this.form.userAddress
    this.booking.eventName = this.form.eventName
    this.booking.eventDescription = this.form.eventDescription
    this.booking.eventDate = this.form.eventDate
    this.booking.eventLocation = this.form.eventLocation
    this.booking.ticketCode = this.form.ticketCode
    this.booking.ticketName = this.form.ticketName
    this.booking.ticketType = this.form.ticketType
    this.booking.ticketDescription = this.form.ticketDescription
    this.booking.totalTickets = this.form.totalTickets
    this.booking.price = this.form.price
    this.booking.bookingDate = this.form.bookingDate
    this.booking.bookingStatus = 'Pending'
    this.booking.created = Date.now()

    // console.log(this.booking)
    // return 
    this.bookingservice.create(this.booking).then(() => {
      this.spinner.hide()
      this.toastr.success("Booked Successfully!!!")
      this.router.navigateByUrl("/layout/bookingstatus")
    })
  }

}
