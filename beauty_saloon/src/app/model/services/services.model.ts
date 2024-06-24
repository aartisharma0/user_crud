export class Services {
        id?: string | undefined | null
        categoryName?: string | undefined | null
        serviceName?: string | undefined | null
        description?: string | undefined | null
        price?: string | undefined | null
        image?: File | undefined
        status?: string
    
        constructor(file: File, categoryName: string,serviceName: string, status: string,description:string,price:string,) {
            this.image = file;
            this.categoryName = categoryName;
            this.serviceName = serviceName;
            this.status = status;
            this.description=description;
            this.price=price;
        }

}
