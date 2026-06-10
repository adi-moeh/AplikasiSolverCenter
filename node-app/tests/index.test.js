const request = require('supertest');
const express = require('express');
const pool = require('../db');
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.set('view engine', 'ejs');
app.set('views', __dirname + '/../views');
app.get('/', async (req, res) => {
  const [rows] = await pool.query('SELECT * FROM solvee');
  res.json(rows);
});

test('GET / returns list of solvee', async () => {
  const res = await request(app).get('/');
  expect(res.statusCode).toEqual(200);
  expect(Array.isArray(res.body)).toBeTruthy();
});
