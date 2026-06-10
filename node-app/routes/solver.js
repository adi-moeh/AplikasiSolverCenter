const router = require('express').Router();
const pool = require('../db');
const { cacheMiddleware } = require('../middleware/cache');

// 1. List all solvers
router.get('/', cacheMiddleware(() => 'solver:list'), async (req, res) => {
  try {
    const [rows] = await pool.query('SELECT * FROM solver');
    res.render('solver', { title: 'Data Solver', data: rows, keyword: '' });
  } catch (err) {
    res.status(500).send(err.message);
  }
});

// 2. Add form
router.get('/tambah', (req, res) => {
  res.render('solver_tambah', { title: 'Tambah Solver' });
});

// 3. Create
router.post('/tambah', async (req, res) => {
  const { nama, sex, No_Masalah, no_hp, noj } = req.body;
  try {
    await pool.query(
      'INSERT INTO solver (Nama, Sex, No_Masalah, No_hp, noj) VALUES (?,?,?,?,?)',
      [nama, sex, No_Masalah, no_hp, noj]
    );
    res.redirect('/solver');
  } catch (err) {
    res.status(500).send(err.message);
  }
});

// 4. Edit form
router.get('/ubah', async (req, res) => {
  const { id } = req.query;
  try {
    const [rows] = await pool.query('SELECT * FROM solver WHERE Id_Sol = ?', [id]);
    if (!rows[0]) return res.status(404).send('Record not found');
    res.render('solver_ubah', { title: 'Ubah Solver', record: rows[0] });
  } catch (err) {
    res.status(500).send(err.message);
  }
});

// 5. Update
router.post('/ubah', async (req, res) => {
  const { id, nama, sex, No_Masalah, no_hp, noj } = req.body;
  try {
    await pool.query(
      'UPDATE solver SET Nama=?, Sex=?, No_Masalah=?, No_hp=?, noj=? WHERE Id_Sol=?',
      [nama, sex, No_Masalah, no_hp, noj, id]
    );
    res.redirect('/solver');
  } catch (err) {
    res.status(500).send(err.message);
  }
});

// 6. Delete
router.get('/hapus', async (req, res) => {
  const { id } = req.query;
  try {
    await pool.query('DELETE FROM solver WHERE Id_Sol = ?', [id]);
    res.redirect('/solver');
  } catch (err) {
    res.status(500).send(err.message);
  }
});

module.exports = router;
