import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { map } from 'rxjs';
import { Events } from 'src/app/models/events/events.model';
import { Tickets } from 'src/app/models/tickets/tickets.model';
import { EventsEvents } from 'src/app/shared/events/events.service';
import { TicketsService } from 'src/app/shared/tickets/tickets.service';
import { TickettypeService } from 'src/app/shared/tickettype/tickettype.service';

@Component({
  selector: 'app-updateticket',
  templateUrl: './updateticket.component.html',
  styleUrls: ['./updateticket.component.css']
})
export class UpdateticketComponent implements OnInit{
  @Input() tickets?: Tickets;

  form: Tickets = {
    ticketType: '',
    ticketCode: '',
    eventName: '',
    eventDate: '',
    eventDescription: '',
    eventLocation: '',
    price: '',
    ticketName: '',
    ticketDescription: '',
    totalTickets:'',
    status: ''
  };

  constructor(
    private ticketService: TicketsService,
    private tickettypeservice:TickettypeService,
    private eventservice:EventsEvents,
    private toastr: ToastrService,
    private spinner: NgxSpinnerService,
    private activatedroute: ActivatedRoute,
    private router:Router
  ) { }

  ngOnInit(): void {
    this.form.ticketCode = this.generateRandomTicketNumber()
    this.singledata();
    this.getalltypes();
    this.getallevents();
  }

  tickettypedata: any
  getalltypes() {
    {
      this.spinner.show()
      this.tickettypeservice.getAll().snapshotChanges().pipe(
        map(changes => {
          return changes.map((c: any) => {
            return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
          })
        })
      ).subscribe((resultdata: any) => {
        this.spinner.hide()
        this.tickettypedata = resultdata
        // console.log(this.tickettypedata)
      })
    }
  }
  eventData: any
  getallevents() {
    {
      this.spinner.show()
      this.eventservice.getAll().snapshotChanges().pipe(
        map(changes => {
          return changes.map((c: any) => {
            return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
          })
        })
      ).subscribe((resultdata: any) => {
        this.spinner.hide()
        this.eventData = resultdata
        // console.log(this.eventData)
      })
    }
  }
  updateEventData() {
    const selectedEventName = this.form.eventName;

    // Find the selected project based on project code
    const selectedEvent = this.eventData.find((event:Events) => event.eventName === selectedEventName);
console.log(selectedEvent,"event")
    if (selectedEvent) {
        // Update the form fields with selected project data
        this.form.eventDescription = selectedEvent.eventDescription;
        this.form.eventDate = selectedEvent.eventDate;
        this.form.eventLocation = selectedEvent.eventLocation;
    }
}
  async singledata() {
    this.spinner.show();
    setTimeout(() => {
      this.spinner.hide();
    }, 3000);
    let snapshot = await this.ticketService
      .getSingle(this.activatedroute.snapshot.paramMap.get('id'))
      .pipe();
    snapshot.forEach((doc) => {
      let data = doc.data();
      this.form.ticketCode = data?.ticketCode;
      this.form.ticketName = data?.ticketName;
      this.form.ticketType = data?.ticketType;
      this.form.eventName = data?.eventName;
      this.form.eventDescription = data?.eventDescription;
      this.form.eventLocation = data?.eventLocation;
      this.form.eventDate = data?.eventDate;
      this.form.ticketDescription = data?.ticketDescription;
      this.form.totalTickets = data?.totalTickets;
      this.form.price = data?.price;
      this.form.status = data?.status;
    });
  }
  generateRandomTicketNumber(): string {
    const randomBillNo = Math.floor(Math.random() * 900000) + 10000;
    return `TICKET-${randomBillNo}`;
  }

  submit() {
    this.spinner.show();

    const data = {
       // Project Detail
    ticketType: this.form.ticketType,
    ticketName : this.form.ticketName,
    eventName : this.form.eventName,
    eventDescription : this.form.eventDescription,
    ticketDescription : this.form.ticketDescription,
    eventDate : this.form.eventDate,
    eventLocation : this.form.eventLocation,
    totalTickets : this.form.totalTickets,
    ticketCode : this.form.ticketCode,
    price : this.form.price,
    status: this.form.status,

    };

    this.ticketService
      .update(this.activatedroute.snapshot.paramMap.get('id'), data)
      .then(() => {
        this.spinner.hide();
        this.toastr.success('Record Updated');
        this.router.navigateByUrl('/layout/manageticket');
      })
      .catch((error) => {
        console.log(error); 
        this.spinner.hide();
      });
  }
}
