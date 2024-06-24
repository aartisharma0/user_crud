import { Component, OnInit } from '@angular/core';
import { User } from '../models/userauth/userauth.model';
import { UserauthService } from '../shared/userauth/userauth.service';
import { NgxSpinnerService } from 'ngx-spinner';
import { map } from 'rxjs';

@Component({
  selector: 'app-viewuser',
  templateUrl: './viewuser.component.html',
  styleUrls: ['./viewuser.component.css']
})
export class ViewuserComponent implements OnInit {
  services?: User[]

  constructor(private service: UserauthService, private spinner: NgxSpinnerService) { }

  ngOnInit(): void {
    this.getData()
  }

  getData() {
    this.spinner.show()
    this.service.getAllUser().snapshotChanges().pipe(
      map(changes => {
        return changes.map((c: any) => {
          return ({ id: c.payload.doc.id, ...c.payload.doc.data() })as User;
        }).filter((user: User) => user.userType === 'User');
      })
    ).subscribe((resultdata: any) => {
      this.spinner.hide()
      this.services = resultdata
    })
  }
 
}
