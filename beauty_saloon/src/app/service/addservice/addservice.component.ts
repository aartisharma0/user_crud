import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { map } from 'rxjs';
import { Services } from 'src/app/model/services/services.model';
import { CategoryService } from 'src/app/shared/category/category.service';
import { ServicesService } from 'src/app/shared/services/services.service';

@Component({
  selector: 'app-addservice',
  templateUrl: './addservice.component.html',
  styleUrls: ['./addservice.component.css']
})
export class AddserviceComponent implements OnInit {
  selectedFiles?: FileList;
  currentFileUpload?: Services;
  percentage = 0;

  form = {
    categoryName: '',
    serviceName: '',
    description: '',
    price: '',
    image: '',
    status:'Enable'
  }

  constructor(private categoryService: CategoryService, private productservice: ServicesService, private toastr: ToastrService, private spinner: NgxSpinnerService, private router: Router) { }

  ngOnInit(): void {
    this.getallcat()
  }

  categorydata: any
  getallcat() {
    {
      this.spinner.show()
      this.categoryService.getAll().snapshotChanges().pipe(
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

  selectFile(event: any): void {
    this.selectedFiles = event.target.files;
  }

  submit() {
    this.spinner.show()
    if (this.selectedFiles) {
      const file: File | null = this.selectedFiles.item(0);
      this.selectedFiles = undefined;

      if (file) {
        this.currentFileUpload = new Services(file, this.form.categoryName, this.form.serviceName,"Enable",this.form.description,this.form.price);
        this.productservice.pushFileToStorage(this.currentFileUpload).subscribe(
          result => {
            console.log(result)
            this.spinner.hide()
            if (result == 100) {
              this.toastr.success("Product Inserted")
              this.router.navigateByUrl("/layout/manageservice")
              setTimeout(() => {
                window.location.reload()
              }, 3000);
            }
          },
          error => {
            console.log(error);
            this.spinner.hide()
          }
        );
      }
    }
  }

}
