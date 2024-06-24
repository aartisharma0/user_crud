import { Injectable } from '@angular/core';
import { AngularFirestore, AngularFirestoreCollection } from '@angular/fire/compat/firestore';
import { Tickettype } from 'src/app/models/tickettype/tickettype.model';

@Injectable({
  providedIn: 'root'
})
export class TickettypeService {
  private dbPath = "/tickettype"

  ticketTypeRef : AngularFirestoreCollection<Tickettype>

  constructor(private db : AngularFirestore) {
    this.ticketTypeRef = db.collection(this.dbPath)
  }

  create(tictype : Tickettype):any{
    return this.ticketTypeRef.add({...tictype})
  }

  getAll(): AngularFirestoreCollection<Tickettype> {
    return this.ticketTypeRef;
  }

  delete(id: string): Promise<void> {
    return this.ticketTypeRef.doc(id).delete();
  }

  getSingle(id: any) {
    return this.ticketTypeRef.doc(id).get()
  }
  
  update(id: any, data: any) {
    return this.ticketTypeRef.doc(id).update(data)
  }

  tickettypestatus(id:any,status:any){
    return this.ticketTypeRef.doc(id).update({status:status})

  }
}
