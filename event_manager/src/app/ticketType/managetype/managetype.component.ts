import { Component, OnInit } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { map } from 'rxjs';
import { Tickettype } from 'src/app/models/tickettype/tickettype.model';
import { TickettypeService } from 'src/app/shared/tickettype/tickettype.service';

@Component({
  selector: 'app-managetype',
  templateUrl: './managetype.component.html',
  styleUrls: ['./managetype.component.css']
})
export class ManagetypeComponent implements OnInit {
  services?: Tickettype[]

  constructor(private service: TickettypeService, private spinner: NgxSpinnerService) { }

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
      this.services = resultdata
    })
  }
  EnableDisable(id:any,status:any){
    this.service.tickettypestatus(id,status).then((res:any)=>{
      this.getData();
    }).catch((err)=>{
      console.log(err)
    })

  }
}
