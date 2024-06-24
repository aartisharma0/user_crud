import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { map } from 'rxjs';
import { Events } from 'src/app/models/events/events.model';
import { EventsEvents } from 'src/app/shared/events/events.service';
import { TicketsService } from 'src/app/shared/tickets/tickets.service';
import { TickettypeService } from 'src/app/shared/tickettype/tickettype.service';

@Component({
  selector: 'app-addticket',
  templateUrl: './addticket.component.html',
  styleUrls: ['./addticket.component.css']
})
export class AddticketComponent implements OnInit{
  form = {
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
  }

  constructor(
    private projectService: TicketsService,
    private tickettypeservice:TickettypeService,
    private eventservice:EventsEvents,
    private toastr: ToastrService,
    private spinner: NgxSpinnerService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.form.ticketCode = this.generateRandomTicketNumber()
    this.getalltypes()
    this.getallevents()
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

  generateRandomTicketNumber(): string {
    const randomBillNo = Math.floor(Math.random() * 900000) + 10000;
    return `TICKET-${randomBillNo}`;
  }
  submit() {
    this.spinner.show();
    this.form.ticketCode = this.form.ticketCode
    this.form.ticketType = this.form.ticketType
    this.form.eventName = this.form.eventName
    this.form.eventDescription = this.form.eventDescription
    this.form.eventDate = this.form.eventDate
    this.form.eventLocation = this.form.eventLocation
    this.form.ticketName = this.form.ticketName
    this.form.ticketDescription = this.form.ticketDescription
    this.form.price = this.form.price
    this.form.totalTickets = this.form.totalTickets
    this.form.status = 'Enable';
    console.log(this.form,"Ticket Data")
    this.projectService.create(this.form).then(
      () => {
        this.spinner.hide();
        this.toastr.success("Record Inserted");
        this.router.navigateByUrl("/layout/manageticket");
      }
    );
  }

}
