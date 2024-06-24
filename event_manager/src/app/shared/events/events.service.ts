import { Injectable } from '@angular/core';
import { AngularFirestore, AngularFirestoreCollection } from '@angular/fire/compat/firestore';
import { AngularFireStorage } from '@angular/fire/compat/storage';
import { Observable, finalize } from 'rxjs';
import { Events } from 'src/app/models/events/events.model';

@Injectable({
  providedIn: 'root'
})
export class EventsEvents {
  private path = "/events"

  eventRef:AngularFirestoreCollection<Events>

  constructor(private db:AngularFirestore,private storage : AngularFireStorage) { 
    this.eventRef = db.collection("/events")
  }

  pushFileToStorage(event : Events):Observable<number | undefined>{
    const filePath = `${this.path}/`+Math.round(Math.random()*1E9)+`${event.image?.name}`;
    const storageRef = this.storage.ref(filePath);
    const uploadTask = this.storage.upload(filePath, event.image);

    uploadTask.snapshotChanges().pipe(
      finalize(() => {
        storageRef.getDownloadURL().subscribe(downloadURL => {
          // console.log("Downloaded URL",downloadURL)
          // console.log("DATA",event)
          let data: Events = {
            image: downloadURL,
            eventName : event.eventName,
            eventDate : event.eventDate,
            eventDescription : event.eventDescription,
            eventLocation : event.eventLocation,
            status : event.status,
            // fileName: event.fileName?.name
          }
          this.saveFileData(data);
          console.log(data,"Event Data")
        });
      })
    ).subscribe(resultdata => {
      // console.log("Result Data",resultdata)
    });
    return uploadTask.percentageChanges();
  }

  updatepushFileToStorage(id:any,file:any,data:any){
    const filePath = `${this.path}/`+Math.round(Math.random()*1E9)+`${file?.name}`;
    const storageRef = this.storage.ref(filePath);
    const uploadTask = this.storage.upload(filePath,file);

    uploadTask.snapshotChanges().pipe(
      finalize(() => {
        storageRef.getDownloadURL().subscribe(downloadURL => {
          // console.log("Downloaded URL",downloadURL)
          let mydata: Events = {
            image: downloadURL,
            eventName : data.eventName,
            eventDate : data.eventDate,
            eventDescription : data.eventDescription,
            eventLocation : data.eventLocation,
          }
          this.update(id,mydata);
        });
      })
    ).subscribe(resultdata => {
      // console.log("Result Data",resultdata)
    });
    return uploadTask.percentageChanges();
  }

  private saveFileData(event: Events): void {
    this.eventRef.add({ ...event })
  }

  getAll():AngularFirestoreCollection<Events>{
    return this.eventRef
  }
  
  getSingle(id:any){
    return this.eventRef.doc(id).get()
  }

  update(id:any,data:any){
    return this.eventRef.doc(id).update(data)
  }
  eventstatus(id:any,status:any){
    return this.eventRef.doc(id).update({status:status})

  }
}
