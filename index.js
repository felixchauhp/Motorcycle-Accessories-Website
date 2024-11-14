const { PrismaClient } = require('@prisma/client')

const prisma = new PrismaClient()

async function main() {
    const allCustomers = await prisma.customers.findMany()
    console.log(allCustomers)
}

main()
  .then(async () => {
    await prisma.$disconnect()
  })
  .catch(async (e) => {
    console.error(e)
    await prisma.$disconnect()
    process.exit(1)
  })