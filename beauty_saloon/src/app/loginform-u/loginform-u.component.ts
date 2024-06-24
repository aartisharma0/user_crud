import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { UserauthService } from '../shared/userauth/userauth.service';

@Component({
  selector: 'app-loginform-u',
  templateUrl: './loginform-u.component.html',
  styleUrls: ['./loginform-u.component.css']
})
export class LoginformUComponent implements OnInit {
  form = {
    email: '',
    password: ''
  }

  constructor(private spinner: NgxSpinnerService, private toastr: ToastrService, private auth: UserauthService) { }

  ngOnInit(): void {

  }

  submit() {
    this.auth.SignIn(this.form)
  }

  googlesubmit() {
    this.auth.GoogleAuth()
  }

}
