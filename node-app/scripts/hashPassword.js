const bcrypt = require('bcryptjs');
const pool = require('../db');
const fs = require('fs');

(async () => {
  const plain = process.argv[2];
  if (!plain) {
    console.error('Usage: node scripts/hashPassword.js <plain_password>');
    process.exit(1);
  }
  const hash = bcrypt.hashSync(plain, 10);
  console.log('Hash:', hash);
  // Optional: update user in DB
  // await pool.execute('UPDATE tb_user SET Password=? WHERE Username=?', [hash, 'amoeh']);
})();
