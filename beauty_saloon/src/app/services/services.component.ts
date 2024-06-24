import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ServicesService } from '../shared/services/services.service';
import { NgxSpinnerService } from 'ngx-spinner';
import { UserauthService } from '../shared/userauth/userauth.service';
import { Services } from '../model/services/services.model';
import { map } from 'rxjs';

@Component({
  selector: 'app-services',
  templateUrl: './services.component.html',
  styleUrls: ['./services.component.css']
})
export class ServicesComponent implements OnInit {

  categoryName: any
  constructor(private activatedroute: ActivatedRoute, private service: ServicesService, private spinner: NgxSpinnerService, private userauth: UserauthService, private router: Router) { }

  ngOnInit(): void {
    this.categoryName = this.activatedroute.snapshot.paramMap.get("category")
    this.getData()
    this.getuserdata()
  }

  services?: Services[]
  getData() {
    this.spinner.show()
    this.service.getProductByCategory(this.categoryName).snapshotChanges().pipe(
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
