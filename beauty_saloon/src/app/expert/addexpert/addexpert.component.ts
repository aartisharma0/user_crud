import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { Experts } from 'src/app/model/experts/experts.model';
import { ExpertsService } from 'src/app/shared/experts/experts.service';

@Component({
  selector: 'app-addexpert',
  templateUrl: './addexpert.component.html',
  styleUrls: ['./addexpert.component.css']
})
export class AddexpertComponent implements OnInit{
  selectedFiles?: FileList;
  currentFileUpload?: Experts;
  percentage = 0;

  form = {
    name: '',
    email: '',
    contact: '',
    address: '',
    experience: '',
    image: '',
    status:"Enable"
  }

  constructor(private expertservice: ExpertsService, private toastr: ToastrService, private spinner: NgxSpinnerService, private router: Router) { }

  ngOnInit(): void {
  }


  selectFile(event: any): void {
    this.selectedFiles = event.target.files;
  }

  submit() {
    this.spinner.show()
    if (this.selectedFiles) {
      const file: File | null = this.selectedFiles.item(0);
      this.selectedFiles = undefined;

      if (file) {
        this.currentFileUpload = new Experts(file, this.form.name, this.form.email,this.form.contact,this.form.address,this.form.experience,"Enable");
        this.expertservice.pushFileToStorage(this.currentFileUpload).subscribe(
          result => {
            console.log(result)
            this.spinner.hide()
            if (result == 100) {
              this.toastr.success("Expert Inserted")
              this.router.navigateByUrl("/layout/manageexpert")
            }
          },
          error => {
            console.log(error);
            this.spinner.hide()
          }
        );
      }
    }
  }
}
