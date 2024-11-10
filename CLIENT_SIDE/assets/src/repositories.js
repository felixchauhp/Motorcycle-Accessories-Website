import { AppDataSource } from "./data-source";
import accounts from "./entity/accounts";

AppDataSource.initialize().then(async () => {
  // console.log("Inserting a new resonator into the database...")
  // const resonator_1 = new resonator()
  // resonator_1.Name = "Quantin"
  // resonator_1.Skill = "SREASE"
  // resonator_1.Age = 50
  // await AppDataSource.manager.save(resonator_1)
  // console.log("Saved a new resonator with id: " + resonator_1.ID)

  const UserRepos = AppDataSource.getRepository(accounts);

  let Users = await UserRepos.find();
  console.log("Users: ", Users);
});
