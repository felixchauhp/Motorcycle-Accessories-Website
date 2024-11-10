import "reflect-metadata"
import { DataSource } from "typeorm"
import AddressList from "./entity/address_list.js"

export const AppDataSource = new DataSource({
    type: "mysql",
    host: "da-ktdl-da-ktdl.j.aivencloud.com",
    port: 17160,
    username: "avnadmin",
    password: "AVNS_BC3CbCWXXYbHw3BP4l-",
    database: "defaultdb",
    synchronize: true,
    logging: true,
    entities: [AddressList],
    migrations: [],
    subscribers: [],
})
