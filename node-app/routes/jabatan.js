const router = require('express').Router();
const pool = require('../db');

router.get('/', async (req,res)=>{const [rows]=await pool.query('SELECT * FROM pegawai');res.render('pegawai', {title:'Data Jabatan',data:rows,keyword:''});});
router.get('/tambah',(req,res)=>{res.render('pegawai_tambah',{title:'Tambah Jabatan'});});
router.post('/tambah',async (req,res)=>{const {noj,jabatan}=req.body;await pool.query('INSERT INTO pegawai (noj,jabatan) VALUES (?,?)',[noj,jabatan]);res.redirect('/pegawai');});
router.get('/ubah',async (req,res)=>{const {id}=req.query;const [rows]=await pool.query('SELECT * FROM pegawai WHERE noj = ?', [id]);res.render('pegawai_ubah',{title:'Ubah Jabatan',record:rows[0]});});
router.post('/ubah',async (req,res)=>{const {id,noj,jabatan}=req.body;await pool.query('UPDATE pegawai SET noj=?,jabatan=? WHERE noj=?',[noj,jabatan,id]);res.redirect('/pegawai');});
router.get('/hapus',async (req,res)=>{const {id}=req.query;await pool.query('DELETE FROM pegawai WHERE noj=?',[id]);res.redirect('/pegawai');});
module.exports=router;
