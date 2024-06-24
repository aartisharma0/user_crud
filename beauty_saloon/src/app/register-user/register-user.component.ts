import { Component } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { UserauthService } from '../shared/userauth/userauth.service';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-register-user',
  templateUrl: './register-user.component.html',
  styleUrls: ['./register-user.component.css']
})
export class RegisterUserComponent {

  form = {
    name: '',
    email: '',
    password: '',
    contact: '',
    address: '',
    gender: ''
  }

  constructor(private authservice: UserauthService, private spinner: NgxSpinnerService, private toastr: ToastrService) { }

  ngOnInit(): void {

  }

  submit() {
    this.authservice.SignUp(this.form)
  }
  googlesubmit() {
    this.authservice.GoogleAuth()
  }
}
