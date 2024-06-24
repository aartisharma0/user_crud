import { Injectable } from '@angular/core';
import { AngularFirestore, AngularFirestoreCollection } from '@angular/fire/compat/firestore';
import { AngularFireStorage } from '@angular/fire/compat/storage';
import { Observable, finalize } from 'rxjs';
import { Experts } from 'src/app/model/experts/experts.model';

@Injectable({
  providedIn: 'root'
})
export class ExpertsService {
  private path = "/experts"

  expertRef: AngularFirestoreCollection<Experts>

  constructor(private db: AngularFirestore, private storage: AngularFireStorage) {
    this.expertRef = db.collection("/experts")
  }

  pushFileToStorage(expert: Experts): Observable<number | undefined> {
    const filePath = `${this.path}/` + Math.round(Math.random() * 1E9) + `${expert.image?.name}`;
    const storageRef = this.storage.ref(filePath);
    const uploadTask = this.storage.upload(filePath, expert.image);

    uploadTask.snapshotChanges().pipe(
      finalize(() => {
        storageRef.getDownloadURL().subscribe(downloadURL => {
          // console.log("Downloaded URL",downloadURL)
          // console.log("DATA",expert)
          let data: Experts = {
            name: expert.name,
            email: expert.email,
            contact: expert.contact,
            address: expert.address,
            experience: expert.experience,
            image: downloadURL,
            status: expert.status,
          }
          this.saveFileData(data);
          console.log(data,"Expert inserted")
        });
      })
    ).subscribe(resultdata => {
      // console.log("Result Data",resultdata)
    });
    return uploadTask.percentageChanges();
  }

  updatepushFileToStorage(id: any, file: any, data: any) {
    const filePath = `${this.path}/` + Math.round(Math.random() * 1E9) + `${file?.name}`;
    const storageRef = this.storage.ref(filePath);
    const uploadTask = this.storage.upload(filePath, file);
     
    uploadTask.snapshotChanges().pipe(
      finalize(() => {
        storageRef.getDownloadURL().subscribe(downloadURL => {
          // console.log("Downloaded URL",downloadURL)
          let mydata: Experts = {
            name: data.name,
            email: data.email,
            contact: data.contact,
            image: downloadURL,
            address: data.address,
            experience: data.experience,
            status: data.status,
          }
          console.log("my data", mydata)
          this.update(id, mydata);
        });
      })
    ).subscribe(resultdata => {
      // console.log("Result Data",resultdata)
    });
    return uploadTask.percentageChanges();
  }

  private saveFileData(product: Experts): void {
    this.expertRef.add({ ...product })
  }

  getAll(): AngularFirestoreCollection<Experts> {
    return this.expertRef
  }

  getSingle(id: any) {
    return this.expertRef.doc(id).get()
  }

  update(id: any, data: any) {
    return this.expertRef.doc(id).update(data)
  }
  
  Expertstatus(id:any,status:any){
    return this.expertRef.doc(id).update({status:status})

  }
}
