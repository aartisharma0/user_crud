import { Component, OnInit } from '@angular/core';
import { Events } from '../models/events/events.model';
import { EventsEvents } from '../shared/events/events.service';
import { NgxSpinnerService } from 'ngx-spinner';
import { map } from 'rxjs';
import { TickettypeService } from '../shared/tickettype/tickettype.service';
import { Tickettype } from '../models/tickettype/tickettype.model';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-showetictype',
  templateUrl: './showetictype.component.html',
  styleUrls: ['./showetictype.component.css']
})
export class ShowetictypeComponent implements OnInit {
  typeData?: Tickettype[]

  constructor(private service: TickettypeService, private spinner: NgxSpinnerService,private activateroute:ActivatedRoute) { }
event:any
  ngOnInit(): void {
    this.getData()
    this.event=this.activateroute.snapshot.paramMap.get("eventName");
    console.log(this.event)
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
      this.typeData = resultdata
    })
  }

}
