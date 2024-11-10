import { EntitySchema } from "typeorm";

export default new EntitySchema({
  name: "accounts",
  tableName: "accounts",
  columns: {
    UserID: {
      primary: true,
      type: "varchar",
    },
    TenTaiKhoan: {
      type: "varchar",
    },
    MatKhau: {
      type: "varchar",
    },
    PhanLoai: {
      type: "varchar",
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
