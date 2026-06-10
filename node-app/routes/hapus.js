const router = require('express').Router();
const pool = require('../db');

router.get('/', async (req, res) => {
  const { id } = req.query;
  try {
    await pool.query('DELETE FROM solvee WHERE Id_S = ?', [id]);
    res.redirect('/');
  } catch (err) {
    res.status(500).send(err.message);
  }
});

module.exports = router;
