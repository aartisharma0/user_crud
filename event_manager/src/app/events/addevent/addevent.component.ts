import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { Events } from 'src/app/models/events/events.model';
import { EventsEvents } from 'src/app/shared/events/events.service';

@Component({
  selector: 'app-addevent',
  templateUrl: './addevent.component.html',
  styleUrls: ['./addevent.component.css']
})
export class AddeventComponent implements OnInit {
  selectedFiles?: FileList;
  currentFileUpload?: Events;
  percentage = 0;

  form = {
    eventName: '',
    image: '',
    eventDate:'',
    eventDescription:'',
    eventLocation:'',
    status:''
  }

  constructor(private service: EventsEvents, private toastr: ToastrService, private spinner: NgxSpinnerService, private router: Router) { }

  ngOnInit(): void {
  }

  selectFile(event: any): void {
    this.selectedFiles = event.target.files;
  }

  submit() {
    // this.spinner.show()
    if (this.selectedFiles) {
      const file: File | null = this.selectedFiles.item(0);
      this.selectedFiles = undefined;

      if (file) {
        this.currentFileUpload = new Events(file, this.form.eventName,"Enable",this.form.eventDate,this.form.eventDescription,this.form.eventLocation);
        this.service.pushFileToStorage(this.currentFileUpload).subscribe(
          result => {
            console.log(result)
            if (result == 100) {
              this.spinner.hide()
              this.toastr.success("Record Inserted")
              this.router.navigateByUrl("/layout/manageevent")
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
