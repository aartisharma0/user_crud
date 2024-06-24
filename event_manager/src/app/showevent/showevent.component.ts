import { Component, OnInit } from '@angular/core';
import { map } from 'rxjs';
import { Events } from '../models/events/events.model';
import { EventsEvents } from '../shared/events/events.service';
import { NgxSpinnerService } from 'ngx-spinner';

@Component({
  selector: 'app-showevent',
  templateUrl: './showevent.component.html',
  styleUrls: ['./showevent.component.css']
})
export class ShoweventComponent implements OnInit {
  eventData?: Events[]

  constructor(private service: EventsEvents, private spinner: NgxSpinnerService) { }

  ngOnInit(): void {
    this.getData()
  }

  getData() {
    this.spinner.show()
    this.service.getAll().snapshotChanges().pipe(
      map(changes => {
        return changes.map((c: any) => {
          return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
        })
      })
    ).subscribe((resultdata: any) => {
      this.spinner.hide()
      this.eventData = resultdata
    })
  }
   

}
