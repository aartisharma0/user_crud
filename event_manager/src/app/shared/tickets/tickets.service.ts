import { Injectable } from '@angular/core';
import { AngularFirestore, AngularFirestoreCollection } from '@angular/fire/compat/firestore';
import { Tickets } from 'src/app/models/tickets/tickets.model';

@Injectable({
  providedIn: 'root'
})
export class TicketsService {
  private dbPath = "/tickets"

  ticketRef : AngularFirestoreCollection<Tickets>

  constructor(private db : AngularFirestore) {
    this.ticketRef = db.collection(this.dbPath)
  }

  create(ticket : Tickets):any{
    return this.ticketRef.add({...ticket})
  }

  getAll(): AngularFirestoreCollection<Tickets> {
    return this.ticketRef;
  }

  delete(id: string): Promise<void> {
    return this.ticketRef.doc(id).delete();
  }

  getSingle(id: any) {
    return this.ticketRef.doc(id).get()
  }
  getAllByTicketCode(ticketCode: string) {
    return this.db.collection(this.dbPath, ref => ref.where("ticketCode", "==", ticketCode))
  }
  getTicketByTicketTypeandEventName(ticketType: string,eventName: string) {
    return this.db.collection(this.dbPath, ref => ref.where("ticketType", "==", ticketType).where("eventName","==",eventName))
  }

  update(id: any, data: any) {
    return this.ticketRef.doc(id).update(data)
  }

  ticketstatus(id:any,status:any){
    return this.ticketRef.doc(id).update({status:status})

  }
}
