import { Component, OnInit } from '@angular/core';
import { EventsEvents } from '../shared/events/events.service';
import { TickettypeService } from '../shared/tickettype/tickettype.service';
import { TicketsService } from '../shared/tickets/tickets.service';
import { UserauthService } from '../shared/userauth/userauth.service';
import { BookingsService } from '../shared/bookings/bookings.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  totalEvents: number = 0;
  totalTicType: number = 0;
  totalTickets: number = 0;
  totalUsers: number = 0;
  totalBookings: number = 0;
  constructor(
    private categoryService: EventsEvents,
    private productService: TickettypeService,
    private service: TicketsService,
    private user: UserauthService,
    private booking: BookingsService
  ) { }

  ngOnInit(): void {
    this.fetchData();
  }

  fetchData() {
    this.categoryService.getAll().snapshotChanges().subscribe((categories) => {
      this.totalEvents = categories.length;
    });
    this.productService.getAll().snapshotChanges().subscribe((categories) => {
      this.totalTicType = categories.length;
    });

    this.productService.getAll().snapshotChanges().subscribe((products) => {
      this.totalTicType = products.length;
    });

    this.service.getAll().snapshotChanges().subscribe((service) => {
      this.totalTickets = service.length;
    });
    this.user.getAllUser().snapshotChanges().subscribe((users) => {
      this.totalUsers = users.length;
    });
    this.booking.getAll().snapshotChanges().subscribe((bookings) => {
      this.totalBookings = bookings.length;
    });


  }
}
