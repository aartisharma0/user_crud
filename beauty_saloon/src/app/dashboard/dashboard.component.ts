import { Component, OnInit } from '@angular/core';
import { CategoryService } from '../shared/category/category.service';
import { ServicesService } from '../shared/services/services.service';
import { ExpertsService } from '../shared/experts/experts.service';
import { UserauthService } from '../shared/userauth/userauth.service';
import { BookingService } from '../shared/booking/booking.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  totalCategories: number = 0;
  totalProducts: number = 0;
  totalExperts: number = 0;
  totalUsers: number = 0;
  totalBookings: number = 0;
  constructor(
    private categoryService: CategoryService,
    private productService: ServicesService,
    private expertService: ExpertsService,
    private user: UserauthService,
    private booking: BookingService
  ) { }

  ngOnInit(): void {
    this.fetchData();
  }

  fetchData() {
    this.categoryService.getAll().snapshotChanges().subscribe((categories) => {
      this.totalCategories = categories.length;
    });

    this.productService.getAll().snapshotChanges().subscribe((products) => {
      this.totalProducts = products.length;
    });

    this.expertService.getAll().snapshotChanges().subscribe((experts) => {
      this.totalExperts = experts.length;
    });
    this.user.getAllUser().snapshotChanges().subscribe((users) => {
      this.totalUsers = users.length;
    });
    this.booking.getAll().snapshotChanges().subscribe((bookings) => {
      this.totalBookings = bookings.length;
    });


  }
}
