import "reflect-metadata";
import { AppDataSource } from "./dataSource";
import { accounts } from "./entity/accounts";

// AppDataSource.initialize().then(async () => {
//   // console.log("Inserting a new resonator into the database...")
//   // const resonator_1 = new resonator()
//   // resonator_1.Name = "Quantin"
//   // resonator_1.Skill = "SREASE"
//   // resonator_1.Age = 50
//   // await AppDataSource.manager.save(resonator_1)
//   // console.log("Saved a new resonator with id: " + resonator_1.ID)

//   const accountsRepository = AppDataSource.getRepository(accounts);
//   const User = await accountsRepository.find({});
//   //     console.log("Loading resonators from the database...");
//   //     const resonators = await resonatorRepository.find();
//   //     console.log("Loaded resonators: ", resonators);

//   //     const rfind_1 = await resonatorRepository.findOne({
//   //       where: { email: "John" },
//   //     });
//   //     console.log("Loaded resonator: ", rfind_1);
//   //     // rfind_1.Skill = "John Cena"
//   //     await resonatorRepository.remove(rfind_1);
//   //     const resonator_s = await resonatorRepository.find();
//   //     console.log("Loaded resonators: ", resonator_s);
// });
//   .catch((error) => console.log(error));

AppDataSource.initialize()
  .then(() => {
    console.log("Kết nối thành công với cơ sở dữ liệu MySQL");
    // Bắt đầu các hoạt động CRUD tại đây
    getAllAccounts();
  })
  .catch((error) => console.log("Lỗi kết nối cơ sở dữ liệu:", error));

async function getAllAccounts() {
  const accountRepository = AppDataSource.getRepository(accounts);
  const allAccounts = await accountRepository.find(); // tương đương SELECT * FROM accounts
  console.log(allAccounts);
}
