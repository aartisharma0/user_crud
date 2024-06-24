import { Component, OnInit } from '@angular/core';
import { Tickets } from '../models/tickets/tickets.model';
import { TicketsService } from '../shared/tickets/tickets.service';
import { NgxSpinnerService } from 'ngx-spinner';
import { ActivatedRoute } from '@angular/router';
import { map } from 'rxjs';
import { UserauthService } from '../shared/userauth/userauth.service';

@Component({
  selector: 'app-showeticket',
  templateUrl: './showeticket.component.html',
  styleUrls: ['./showeticket.component.css']
})
export class ShoweticketComponent implements OnInit {
  services?: Tickets[]

  constructor(private service: TicketsService, private spinner: NgxSpinnerService,private activateroute:ActivatedRoute,private userauth: UserauthService) { }
event:any
type:any
  ngOnInit(): void {
    this.event=this.activateroute.snapshot.paramMap.get("eventName");
    this.type=this.activateroute.snapshot.paramMap.get("tickettype");
    console.log(this.event,this.type)
    this.getData()
    this.getuserdata()
  }

  getData() {
    this.spinner.show()
    this.service.getTicketByTicketTypeandEventName(this.type,this.event).snapshotChanges().pipe(
      map((changes: any[]) => {
        return changes.map((c: any) => {
          return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
        })
      })
    ).subscribe((resultdata: any) => {
      this.spinner.hide()
      this.services = resultdata
      console.log(this.service)
    })
  }
  EnableDisable(id:any,status:any){
    this.service.ticketstatus(id,status).then((res:any)=>{
      this.getData();
    }).catch((err)=>{
      console.log(err)
    })

  }
  isloggedIn: any = false
  userdata: any
  getuserdata() {
    this.userauth.getUserByUid(localStorage.getItem('uid')).snapshotChanges().pipe(
      map(changes => {
        return changes.map((c: any) => {
          return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
        })
      })
    ).subscribe((resultdata: any) => {
      this.userdata = resultdata[0]
      this.isloggedIn = localStorage.getItem("isauthenticated")
    })
  }
}
