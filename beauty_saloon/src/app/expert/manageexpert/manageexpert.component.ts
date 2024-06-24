import { Component, OnInit } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { map } from 'rxjs';
import { Experts } from 'src/app/model/experts/experts.model';
import { ExpertsService } from 'src/app/shared/experts/experts.service';

@Component({
  selector: 'app-manageexpert',
  templateUrl: './manageexpert.component.html',
  styleUrls: ['./manageexpert.component.css']
})
export class ManageexpertComponent implements OnInit {
  expert?: Experts[]

  constructor(private expertservice: ExpertsService, private spinner: NgxSpinnerService) { }

  ngOnInit(): void {
    this.getData()
  }

  getData(){
    this.spinner.show()
    this.expertservice.getAll().snapshotChanges().pipe(
      map(changes=>{
        return changes.map((c:any)=>{
          return ({id:c.payload.doc.id,...c.payload.doc.data()})
        })
      })
    ).subscribe((resultdata:any)=>{
      this.spinner.hide()
      this.expert = resultdata
    })
  }
  toggleStatus(product: Experts) {
    const updatedProduct: Experts = { ...product };
    updatedProduct.status = product.status === 'enable' ? 'disable' : 'enable';

    this.expertservice.update(product.id, { status: updatedProduct.status })
      .then(() => {
        product.status = updatedProduct.status; 
      })
      .catch((error) => {
        console.log(error);
      });
  }
  EnableDisable(id:any,status:any){
    this.expertservice.Expertstatus(id,status).then((res:any)=>{
      this.getData();
    }).catch((err)=>{
      console.log(err)
    })

  }
}
