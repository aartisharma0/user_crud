import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { ToastrService } from 'ngx-toastr';
import { Experts } from 'src/app/model/experts/experts.model';
import { ExpertsService } from 'src/app/shared/experts/experts.service';

@Component({
  selector: 'app-updateexpert',
  templateUrl: './updateexpert.component.html',
  styleUrls: ['./updateexpert.component.css']
})
export class UpdateexpertComponent implements OnInit{
  @Input() expert?: Experts

  selectedFiles?: FileList;
  // currentFileUpload?: Notes;
  percentage = 0;

  currentExpert : Experts = {
    name: '',
    email: '',
    contact: '',
    address: '',
    experience: '',
    status:"Enable",
  }

  constructor(private expertservice : ExpertsService, private router : Router,private spinner : NgxSpinnerService,private toastr : ToastrService,private activatedroute : ActivatedRoute) { }

  ngOnInit(): void {
    this.singledata()
  }

  


  async singledata() {
    this.spinner.show()
    setTimeout(() => {
      this.spinner.hide()
    }, 3000);
    let snapshot = await this.expertservice.getSingle(this.activatedroute.snapshot.paramMap.get("id")).pipe()
    snapshot.forEach(doc => {
      // console.log("data", doc.data())
      let data = doc.data()
      this.currentExpert.name = data?.name
      this.currentExpert.email = data?.email
      this.currentExpert.contact = data?.contact
      this.currentExpert.address = data?.address
      this.currentExpert.experience = data?.experience
      this.currentExpert.status = data?.status
    })
    // console.log("snapshot", snapshot.data())
  }

  selectFile(event: any): void {
    this.selectedFiles = event.target.files;
  }

  submit(){
    // this.spinner.show()
    if (this.selectedFiles) {
      const file: File | null = this.selectedFiles.item(0);
      this.selectedFiles = undefined;
      
      if (file) {
        
        console.log("New File Uploading")
        const data = {
          name : this.currentExpert.name,
          email : this.currentExpert.email,
          contact : this.currentExpert.contact,
          address : this.currentExpert.address,
          experience : this.currentExpert.experience,
          status : this.currentExpert.status,
        }

        this.expertservice.updatepushFileToStorage((this.activatedroute.snapshot.paramMap.get("id")),file,data).subscribe(
          result => {
            if(result==100)
            {
              this.spinner.hide()
              this.toastr.success("Record Updated")
              this.router.navigateByUrl("/layout/manageexpert")
              // setTimeout(() => {
              //   window.location.reload()
              // }, 4000);
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
        name : this.currentExpert.name,
          email : this.currentExpert.email,
          contact : this.currentExpert.contact,
          address : this.currentExpert.address,
          experience : this.currentExpert.experience,
          status : this.currentExpert.status,
      }
  
      this.expertservice.update((this.activatedroute.snapshot.paramMap.get("id")),data).then(()=>{
        this.spinner.hide()
        this.toastr.success("Record Updated")
        this.router.navigateByUrl("/layout/manageexpert")
        setTimeout(() => {
          window.location.reload()
        }, 4000);
      })
    }
  }
}
