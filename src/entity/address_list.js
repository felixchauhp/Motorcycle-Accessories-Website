import { EntitySchema } from "typeorm";

export default new EntitySchema({
    name: 'AddressList',
    tableName: 'address_list',
    columns: {
        Address: {
            primary: true,
            type: 'varchar',
            length: 255,
        },
        CustomerID: {
            primary: true,
            type: 'varchar',
            length: 50,
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