import { AppDataSource } from "./data-source.js"
import accounts from "./entity/accounts.js"

AppDataSource.initialize().then(async () => {
    const accountRepository = AppDataSource.getRepository(accounts)
    console.log("accounts found: ")
    const accounts_check = await accountRepository.find()
    console.log(accounts_check);

}).catch(error => console.log(error))
