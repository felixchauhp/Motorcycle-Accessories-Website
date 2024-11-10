import { AppDataSource } from "./data-source.js"
import AddressList from "./entity/address_list.js"

AppDataSource.initialize().then(async () => {
    const accountRepository = AppDataSource.getRepository(AddressList)
    console.log("Data found: ")
    const accounts_check = await accountRepository.find()
    console.log(accounts_check);

}).catch(error => console.log(error))
