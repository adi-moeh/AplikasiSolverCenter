const router = require('express').Router();
const pool = require('../db');

// GET root – list solvee
router.get('/', async (req, res) => {
  try {
    const [rows] = await pool.query('SELECT * FROM solvee');
    res.render('index', { title: 'Halaman Admin', data: rows, keyword: '' });
  } catch (err) {
    res.status(500).send(err.message);
  }
});

module.exports = router;
