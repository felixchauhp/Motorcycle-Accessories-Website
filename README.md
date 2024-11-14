Sử dụng PrismaORM để connect database với backend
Trước hết hãy sử dụng code "npm install prisma" để có node_modules
Tiếp theo sử dụng lệnh "npm install @prisma/client" để tạo client của prisma
Sau đó đổi lại Database URL trong file env theo cú pháp sau: 
mysql://USER:PASSWORD@HOST:PORT/DATABASE
Trong đó USER và PASSWORD là username và password được cấp
Sử dụng lệnh "npx prisma generate" để tạo các entity trong client của prisma để chạy
Sử dụng "node index.js" để kiểm tra hoạt động của PrismaORM