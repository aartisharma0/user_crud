export class Experts {
        id?: string | undefined | null
        name?: string | undefined | null
        email?: string | undefined | null
        contact?: string | undefined | null
        address?: string | undefined | null
        image?: File | undefined
        experience?: string | undefined | null
        status?: string
    
        constructor(file: File, name: string,email: string, contact: string,address:string,experience:string,status:string) {
            this.image = file;
            this.name = name;
            this.email = email;
            this.contact = contact;
            this.status = status;
            this.address=address;
            this.experience=experience;
        }
}
