export class Events {
    id?:string
    eventName?:string
    image?:File
    eventDate?:string
    eventDescription?:string
    eventLocation?:string
    status?:string

    constructor(file: File, eventName: string, status: string,eventDate:string,eventDescription:string,eventLocation:string) {
        this.image = file;
        this.eventName = eventName;
        this.eventDate=eventDate;
        this.eventDescription=eventDescription;
        this.eventLocation=eventLocation;
        this.status = status;
    }

}
