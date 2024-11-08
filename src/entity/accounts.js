import { EntitySchema } from "typeorm";

export default new EntitySchema({
    name: 'accounts',
    tableName: 'accounts',
    columns: {
        accountID: {
            primary: true,
            type: 'varchar',
        },
        username: {
            type: 'varchar',
        },
        password: {
            type: 'varchar',
        },
        typeID: {
            type: 'varchar',
        },
    },
    relations: {
        // profile: {
        //     target: 'Profile', // Tên entity Profile
        //     type: 'one-to-one', // Thiết lập quan hệ one-to-one
        //     joinColumn: true, // Đánh dấu User là bảng chủ chứa khóa ngoại
        //     cascade: true,
        // },
    },
});