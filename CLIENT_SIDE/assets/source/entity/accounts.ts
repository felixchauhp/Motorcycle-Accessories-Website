import { Entity, PrimaryGeneratedColumn, Column, PrimaryColumn } from "typeorm";

@Entity()
export class accounts {
  @PrimaryColumn()
  UserID: string;

  @Column()
  TenTaiKhoan: string;

  @Column()
  MatKhau: string;

  @Column()
  PhanLoai: string;
}
