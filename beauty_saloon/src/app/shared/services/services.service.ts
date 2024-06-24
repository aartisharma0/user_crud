import { Injectable } from '@angular/core';
import { AngularFirestore, AngularFirestoreCollection } from '@angular/fire/compat/firestore';
import { AngularFireStorage } from '@angular/fire/compat/storage';
import { Observable, finalize } from 'rxjs';
import { Services } from 'src/app/model/services/services.model';

@Injectable({
  providedIn: 'root'
})
export class ServicesService {
  private path = "/services"

  serviceRef: AngularFirestoreCollection<Services>

  constructor(private db: AngularFirestore, private storage: AngularFireStorage) {
    this.serviceRef = db.collection("/services")
  }

  pushFileToStorage(product: Services): Observable<number | undefined> {
    const filePath = `${this.path}/` + Math.round(Math.random() * 1E9) + `${product.image?.name}`;
    const storageRef = this.storage.ref(filePath);
    const uploadTask = this.storage.upload(filePath, product.image);

    uploadTask.snapshotChanges().pipe(
      finalize(() => {
        storageRef.getDownloadURL().subscribe(downloadURL => {
          // console.log("Downloaded URL",downloadURL)
          // console.log("DATA",product)
          let data: Services = {
            categoryName: product.categoryName,
            serviceName: product.serviceName,
            description: product.description,
            price: product.price,
            image: downloadURL,
            status: product.status,
          }
          this.saveFileData(data);
          console.log(data,"Product inserted")
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
          let mydata: Services = {
            categoryName: data.categoryName,
            serviceName: data.serviceName,
            description: data.description,
            image: downloadURL,
            price: data.price,
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

  private saveFileData(product: Services): void {
    this.serviceRef.add({ ...product })
  }

  getAll(): AngularFirestoreCollection<Services> {
    return this.serviceRef
  }

  getSingle(id: any) {
    return this.serviceRef.doc(id).get()
  }

  update(id: any, data: any) {
    return this.serviceRef.doc(id).update(data)
  }
  getProductByCategory(categoryName: any) {
    return this.db.collection(this.path, ref => ref.where("categoryName", "==", categoryName))
  }
  getProductByservice(serviceName: any) {
    return this.db.collection(this.path, ref => ref.where("serviceName", "==", serviceName))
  }
  productstatus(id:any,status:any){
    return this.serviceRef.doc(id).update({status:status})

  }
  
}
