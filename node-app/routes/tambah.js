const router = require('express').Router();
const pool = require('../db');

// tampilkan form tambah
router.get('/', (req, res) => {
  res.render('tambah', { title: 'Tambah Solvee' });
});

// proses tambah
router.post('/', async (req, res) => {
  const { nama, sex, no_hp, alamat, TTL, No_Masalah } = req.body;
  try {
    await pool.query(
      'INSERT INTO solvee (Nama, Sex, No_hp, Alamat, TTL, No_Masalah) VALUES (?,?,?,?,?,?)',
      [nama, sex, no_hp, alamat, TTL, No_Masalah]
    );
    res.redirect('/');
  } catch (err) {
    res.status(500).send(err.message);
  }
});

module.exports = router;
