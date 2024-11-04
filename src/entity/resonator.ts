import { Entity, PrimaryGeneratedColumn, Column } from "typeorm"

@Entity()
export class resonator {

    @PrimaryGeneratedColumn()
    ID: number

    @Column()
    Name: string

    @Column()
    Skill: string

    @Column()
    Age: number

}
