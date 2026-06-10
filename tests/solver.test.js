const request = require('supertest');
const app = require('../server'); // expose Express app
const pool = require('../db');

beforeAll(async () => {
  // Ensure test DB has known state
  await pool.execute('DELETE FROM solvee');
  await pool.execute('INSERT INTO solvee (Nama, Sex, No_hp, Alamat, TTL, No_Masalah) VALUES (?,?,?,?,?,?)',
    ['TestUser', 'L', '123456', 'Address', '2026-01-01', 1]);
});

afterAll(async () => {
  await pool.execute('DELETE FROM solvee');
  await pool.end();
});

test('GET / - list solvee', async () => {
  const res = await request(app).get('/');
  expect(res.status).toBe(200);
  expect(res.body.length).toBeGreaterThan(0);
});

test('POST /tambah - tambah solvee', async () => {
  const res = await request(app).post('/tambah').send({
    nama:'Bob', sex:'P', no_hp:'987654', alamat:'Test', TTL:'2026-02-02', No_Masalah:2
  });
  expect(res.status).toBe(302); // redirect
  const [rows] = await pool.query('SELECT * FROM solvee WHERE Nama=?', ['Bob']);
  expect(rows.length).toBe(1);
});
