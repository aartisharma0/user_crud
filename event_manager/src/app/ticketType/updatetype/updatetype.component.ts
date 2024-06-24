import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { Tickettype } from 'src/app/models/tickettype/tickettype.model';
import { TickettypeService } from 'src/app/shared/tickettype/tickettype.service';

@Component({
  selector: 'app-updatetype',
  templateUrl: './updatetype.component.html',
  styleUrls: ['./updatetype.component.css']
})
export class UpdatetypeComponent implements OnInit{
  @Input() project?: Tickettype;

  form: Tickettype = {
    ticketType: '',
    status: ''
  };

  constructor(
    private empservice: TickettypeService,
    private router: Router,
    private spinner: NgxSpinnerService,
    private toastr: ToastrService,
    private activatedroute: ActivatedRoute
  ) { }

  ngOnInit(): void {
    this.singledata();
  }

  async singledata() {
    this.spinner.show();
    setTimeout(() => {
      this.spinner.hide();
    }, 3000);
    let snapshot = await this.empservice
      .getSingle(this.activatedroute.snapshot.paramMap.get('id'))
      .pipe();
    snapshot.forEach((doc) => {
      let data = doc.data();
      this.form.ticketType = data?.ticketType;
      this.form.status = data?.status;
    });
  }

  submit() {
    this.spinner.show();

    const data = {
      ticketType: this.form.ticketType,
      status: 'Enable'
    };

    this.empservice
      .update(this.activatedroute.snapshot.paramMap.get('id'), data)
      .then(() => {
        this.spinner.hide();
        this.toastr.success('Record Updated');
        this.router.navigateByUrl('/layout/managetype');
      })
      .catch((error) => {
        console.log(error);
        this.spinner.hide();
      });
  }
}
