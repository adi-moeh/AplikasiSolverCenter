const router = require('express').Router();
const pool = require('../db');

router.get('/', async (req,res)=>{const [rows]=await pool.query('SELECT * FROM admin');res.render('admin', {title:'Data Admin',data:rows,keyword:''});});
router.get('/tambah',(req,res)=>{res.render('admin_tambah',{title:'Tambah Admin'});});
router.post('/tambah',async (req,res)=>{const {nama,sex,no_hp,noj}=req.body;await pool.query('INSERT INTO admin (Nama,Sex,No_hp,noj) VALUES (?,?,?,?)',[nama,sex,no_hp,noj]);res.redirect('/admin');});
router.get('/ubah',async (req,res)=>{const {id}=req.query;const [rows]=await pool.query('SELECT * FROM admin WHERE Id_ad = ?', [id]);res.render('admin_ubah',{title:'Ubah Admin',record:rows[0]});});
router.post('/ubah',async (req,res)=>{const {id,nama,sex,no_hp,noj}=req.body;await pool.query('UPDATE admin SET Nama=?,Sex=?,No_hp=?,noj=? WHERE Id_ad=?',[nama,sex,no_hp,noj,id]);res.redirect('/admin');});
router.get('/hapus',async (req,res)=>{const {id}=req.query;await pool.query('DELETE FROM admin WHERE Id_ad=?',[id]);res.redirect('/admin');});
module.exports=router;
