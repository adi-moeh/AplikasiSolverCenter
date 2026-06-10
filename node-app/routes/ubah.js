const router = require('express').Router();
const pool = require('../db');

// tampilkan form ubah
router.get('/', async (req, res) => {
  const { id } = req.query;
  try {
    const [rows] = await pool.query('SELECT * FROM solvee WHERE Id_S = ?', [id]);
    if (!rows[0]) return res.status(404).send('Record not found');
    res.render('ubah', { title: 'Ubah Solvee', record: rows[0] });
  } catch (err) {
    res.status(500).send(err.message);
  }
});

// proses ubah
router.post('/', async (req, res) => {
  const { id, nama, sex, no_hp, alamat, TTL, No_Masalah } = req.body;
  try {
    await pool.query(
      'UPDATE solvee SET Nama=?, Sex=?, No_hp=?, Alamat=?, TTL=?, No_Masalah=? WHERE Id_S = ?',
      [nama, sex, no_hp, alamat, TTL, No_Masalah, id]
    );
    res.redirect('/');
  } catch (err) {
    res.status(500).send(err.message);
  }
});

module.exports = router;
