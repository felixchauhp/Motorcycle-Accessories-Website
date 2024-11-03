import { AppDataSource } from "./data-source"
import { resonator } from "./entity/resonator"

AppDataSource.initialize().then(async () => {

    // console.log("Inserting a new resonator into the database...")
    // const resonator_1 = new resonator()
    // resonator_1.Name = "Quantin"
    // resonator_1.Skill = "SREASE"
    // resonator_1.Age = 50
    // await AppDataSource.manager.save(resonator_1)
    // console.log("Saved a new resonator with id: " + resonator_1.ID)

    const resonatorRepository = AppDataSource.getRepository(resonator)

    console.log("Loading resonators from the database...")
    const resonators = await resonatorRepository.find()
    console.log("Loaded resonators: ", resonators)

    const rfind_1 = await resonatorRepository.findOne({where: {Name: "John"}})
    console.log("Loaded resonator: ", rfind_1)
    // rfind_1.Skill = "John Cena"
    await resonatorRepository.remove(rfind_1)
    const resonator_s = await resonatorRepository.find()
    console.log("Loaded resonators: ", resonator_s)

}).catch(error => console.log(error))
