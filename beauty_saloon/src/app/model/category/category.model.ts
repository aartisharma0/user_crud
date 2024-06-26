export class Category {
    id?: string | undefined | null
    categoryName?: string | undefined | null
    fileName?: File | undefined
    status?: string
    created_at?: Date

    constructor(file: File, categoryName: string, status: string) {
        this.fileName = file;
        this.categoryName = categoryName;
        this.status = status;
    }
}
