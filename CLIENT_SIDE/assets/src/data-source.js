import "reflect-metadata";
import { DataSource } from "typeorm";
import accounts from "./entity/accounts.js";

export const AppDataSource = new DataSource({
  type: "mysql",
  host: "localhost",
  port: 3306,
  username: "root",
  password: "123456789",
  database: "mydatabase",
  synchronize: true,
  logging: true,
  entities: [accounts],
  migrations: [],
  subscribers: [],
});
