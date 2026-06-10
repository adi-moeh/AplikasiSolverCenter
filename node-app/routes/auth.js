const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');
const pool = require('../db');
const express = require('express');
const router = express.Router();

// login endpoint – POST /auth/login
router.post('/login', async (req, res) => {
  const { Username, Password } = req.body;
  if (!Username || !Password) return res.status(400).json({ error: 'Missing credentials' });
  try {
    const [rows] = await pool.query('SELECT * FROM tb_user WHERE Username = ?', [Username]);
    if (!rows[0]) return res.status(401).json({ error: 'Invalid username' });
    const match = bcrypt.compareSync(Password, rows[0].Password);
    if (!match) return res.status(401).json({ error: 'Invalid password' });
    const token = jwt.sign({ id: rows[0].Id_user, Username }, process.env.JWT_SECRET, { expiresIn: '1h' });
    res.json({ token });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// protected route – GET /auth/profile
router.get('/profile', authMiddleware, async (req, res) => {
  res.json({ user: req.user });
});

module.exports = router;

function authMiddleware(req, res, next) {
  const auth = req.headers.authorization;
  if (!auth || !auth.startsWith('Bearer ')) return res.status(401).json({ error: 'No token' });
  const token = auth.split(' ')[1];
  try {
    const payload = jwt.verify(token, process.env.JWT_SECRET);
    req.user = payload;
    next();
  } catch (err) {
    res.status(401).json({ error: 'Invalid token' });
  }
}
