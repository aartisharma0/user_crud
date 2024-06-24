import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { map } from 'rxjs';
import { Services } from 'src/app/model/services/services.model';
import { CategoryService } from 'src/app/shared/category/category.service';
import { ServicesService } from 'src/app/shared/services/services.service';

@Component({
  selector: 'app-updateservice',
  templateUrl: './updateservice.component.html',
  styleUrls: ['./updateservice.component.css']
})
export class UpdateserviceComponent implements OnInit {
  @Input() service?: Services

  selectedFiles?: FileList;
  // currentFileUpload?: Notes;
  percentage = 0;

  currentProduct : Services = {
    categoryName: '',
    serviceName: '',
    description: '',
    price: '',
    status:"Enable",
  }

  constructor(private categoryservice : CategoryService,private productservice : ServicesService, private router : Router,private spinner : NgxSpinnerService,private toastr : ToastrService,private activatedroute : ActivatedRoute) { }

  ngOnInit(): void {
    this.getallcat()
    this.singledata()
  }

  categorydata: any
  getallcat() {
    {
      this.spinner.show()
      this.categoryservice.getAll().snapshotChanges().pipe(
        map(changes => {
          return changes.map((c: any) => {
            return ({ id: c.payload.doc.id, ...c.payload.doc.data() })
          })
        })
      ).subscribe((resultdata: any) => {
        this.spinner.hide()
        this.categorydata = resultdata
      })
    }
  }


  async singledata() {
    this.spinner.show()
    setTimeout(() => {
      this.spinner.hide()
    }, 3000);
    let snapshot = await this.productservice.getSingle(this.activatedroute.snapshot.paramMap.get("id")).pipe()
    snapshot.forEach(doc => {
      // console.log("data", doc.data())
      let data = doc.data()
      this.currentProduct.categoryName = data?.categoryName
      this.currentProduct.serviceName = data?.serviceName
      this.currentProduct.description = data?.description
      this.currentProduct.price = data?.price
      this.currentProduct.status = data?.status
    })
    // console.log("snapshot", snapshot.data())
  }

  selectFile(event: any): void {
    this.selectedFiles = event.target.files;
  }

  submit(){
    this.spinner.show()
    if (this.selectedFiles) {
      const file: File | null = this.selectedFiles.item(0);
      this.selectedFiles = undefined;
      
      if (file) {
        
        console.log("New File Uploading")
        const data = {
          categoryName : this.currentProduct.categoryName,
          serviceName : this.currentProduct.serviceName,
          description : this.currentProduct.description,
          price : this.currentProduct.price,
          status : this.currentProduct.status,
        }

        this.productservice.updatepushFileToStorage((this.activatedroute.snapshot.paramMap.get("id")),file,data).subscribe(
          result => {
            if(result==100)
            {
              this.spinner.hide()
              this.toastr.success("Record Updated")
              this.router.navigateByUrl("/layout/manageservice")
              setTimeout(() => {
                window.location.reload()
              }, 3000);
            }
          },
          error => {
            console.log("Error here",error);
            this.spinner.hide()
          }
        );
      }
    }
    else{
      console.log("Keep previous File Uploading")
      const data = {
        categoryName : this.currentProduct.categoryName,
          serviceName : this.currentProduct.serviceName,
          description : this.currentProduct.description,
          price : this.currentProduct.price,
          status : this.currentProduct.status,
      }
  
      this.productservice.update((this.activatedroute.snapshot.paramMap.get("id")),data).then(()=>{
        this.spinner.hide()
        this.toastr.success("Record Updated")
        this.router.navigateByUrl("/layout/manageservice")
        setTimeout(() => {
          window.location.reload()
        }, 3000);
      })
    }
  }
}