import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { TickettypeService } from 'src/app/shared/tickettype/tickettype.service';

@Component({
  selector: 'app-addtype',
  templateUrl: './addtype.component.html',
  styleUrls: ['./addtype.component.css']
})
export class AddtypeComponent implements OnInit{
  form = {
    ticketType: '',
    status: ''
  }

  constructor(
    private projectService: TickettypeService,
    private toastr: ToastrService,
    private spinner: NgxSpinnerService,
    private router: Router
  ) { }

  ngOnInit(): void {

  }

 
  submit() {
    this.spinner.show();
    this.form.ticketType = this.form.ticketType
    this.form.status = 'Enable';
    this.projectService.create(this.form).then(
      () => {
        this.spinner.hide();
        this.toastr.success("Record Inserted");
        this.router.navigateByUrl("/layout/managetype");
      }
    );
  }

}
