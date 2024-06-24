import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { Events } from 'src/app/models/events/events.model';
import { EventsEvents } from 'src/app/shared/events/events.service';

@Component({
  selector: 'app-updateevent',
  templateUrl: './updateevent.component.html',
  styleUrls: ['./updateevent.component.css']
})
export class UpdateeventComponent implements OnInit {
  @Input() categories?: Events

  selectedFiles?: FileList;
  // currentFileUpload?: Notes;
  percentage = 0;

  currentEvent: Events = {
    eventName: '',
    eventDate: '',
    eventDescription: '',
    eventLocation: '',
    status: ''
  }

  constructor(private service: EventsEvents, private router: Router, private spinner: NgxSpinnerService, private toastr: ToastrService, private activatedroute: ActivatedRoute) { }

  ngOnInit(): void {
    this.singledata()
  }

  async singledata() {
    this.spinner.show()
    setTimeout(() => {
      this.spinner.hide()
    }, 3000);
    let snapshot = await this.service.getSingle(this.activatedroute.snapshot.paramMap.get("id")).pipe()
    snapshot.forEach(doc => {
      // console.log("data", doc.data())
      let data = doc.data()
      this.currentEvent.eventName = data?.eventName
      this.currentEvent.image = data?.image
      this.currentEvent.eventDate = data?.eventDate
      this.currentEvent.eventDescription = data?.eventDescription
      this.currentEvent.eventLocation = data?.eventLocation
      this.currentEvent.status = data?.status
    })
    // console.log("snapshot", snapshot.data())
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

        // console.log("New File Uploading")
        const data = {
          eventName: this.currentEvent.eventName,
          eventDescription: this.currentEvent.eventDescription,
          eventDate: this.currentEvent.eventDate,
          eventLocation: this.currentEvent.eventLocation,
        }

        this.service.updatepushFileToStorage((this.activatedroute.snapshot.paramMap.get("id")), file, data).subscribe(
          result => {
            if (result == 100) {
              this.spinner.hide()
              this.toastr.success("Record Updated")
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
    else {
      // console.log("Keep previous File Uploading")
      const data = {
        eventName: this.currentEvent.eventName,
        eventDescription: this.currentEvent.eventDescription,
        eventDate: this.currentEvent.eventDate,
        eventLocation: this.currentEvent.eventLocation,
      }

      this.service.update((this.activatedroute.snapshot.paramMap.get("id")), data).then(() => {
        this.spinner.hide()
        this.toastr.success("Record Updated")
        this.router.navigateByUrl("/layout/manageevent")
      })
    }
  }
}
