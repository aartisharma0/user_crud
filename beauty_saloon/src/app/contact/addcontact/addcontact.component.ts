import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { Contact } from 'src/app/model/contact/contact.model';
import { ContactService } from 'src/app/shared/contact/contact.service';

@Component({
  selector: 'app-addcontact',
  templateUrl: './addcontact.component.html',
  styleUrls: ['./addcontact.component.css']
})
export class AddcontactComponent implements OnInit {
  contact: Contact = new Contact()

  form = {
    name: '',
    email: '',
    subject: '',
    message: ''
  }

  constructor(private toastr: ToastrService, private spinner: NgxSpinnerService, private contactservice: ContactService, private router: Router) { }

  ngOnInit(): void {
  }

  submit() {
    this.spinner.show()
    this.contact.name = this.form.name
    this.contact.email = this.form.email
    this.contact.subject = this.form.subject
    this.contact.message = this.form.message
    this.contact.created = Date.now()

    this.contactservice.create(this.contact).then(() => {
      this.spinner.hide()
      this.toastr.success("Your Enquiry Sent Successfully!!")
      setTimeout(() => {
        window.location.reload()
      }, 1000);
    })
  }

}
