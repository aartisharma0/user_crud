import { Component, OnInit } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { map } from 'rxjs';
import { Tickets } from 'src/app/models/tickets/tickets.model';
import { TicketsService } from 'src/app/shared/tickets/tickets.service';

@Component({
  selector: 'app-manageticket',
  templateUrl: './manageticket.component.html',
  styleUrls: ['./manageticket.component.css']
})
export class ManageticketComponent implements OnInit {
  services?: Tickets[]

  constructor(private service: TicketsService, private spinner: NgxSpinnerService) { }

  ngOnInit(): void {
    this.getData()
  }

  getData() {
    this.spinner.show()
    this.service.getAll().snapshotChanges().pipe(
      map((changes: any[]) => {
        return changes.map((c: any) => {
          return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
        })
      })
    ).subscribe((resultdata: any) => {
      this.spinner.hide()
      this.services = resultdata
    })
  }
  EnableDisable(id:any,status:any){
    this.service.ticketstatus(id,status).then((res:any)=>{
      this.getData();
    }).catch((err)=>{
      console.log(err)
    })

  }
}
