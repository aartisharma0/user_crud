import { Component, OnInit } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { map } from 'rxjs';
import { Services } from 'src/app/model/services/services.model';
import { ServicesService } from 'src/app/shared/services/services.service';

@Component({
  selector: 'app-manageservice',
  templateUrl: './manageservice.component.html',
  styleUrls: ['./manageservice.component.css']
})
export class ManageserviceComponent implements OnInit{
  services?: Services[]

  constructor(private productservice: ServicesService, private spinner: NgxSpinnerService) { }

  ngOnInit(): void {
    this.getData()
  }

  getData(){
    this.spinner.show()
    this.productservice.getAll().snapshotChanges().pipe(
      map(changes=>{
        return changes.map((c:any)=>{
          return ({id:c.payload.doc.id,...c.payload.doc.data()})
        })
      })
    ).subscribe((resultdata:any)=>{
      this.spinner.hide()
      this.services = resultdata
    })
  }
  toggleStatus(product: Services) {
    const updatedProduct: Services = { ...product };
    updatedProduct.status = product.status === 'enable' ? 'disable' : 'enable';

    this.productservice.update(product.id, { status: updatedProduct.status })
      .then(() => {
        product.status = updatedProduct.status; 
      })
      .catch((error) => {
        console.log(error);
      });
  }
  EnableDisable(id:any,status:any){
    this.productservice.productstatus(id,status).then((res:any)=>{
      this.getData();
    }).catch((err)=>{
      console.log(err)
    })

  }
}
