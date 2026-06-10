const router = require('express').Router();
const pool = require('../db');

router.get('/', async (req,res)=>{const [rows]=await pool.query('SELECT * FROM promotor');res.render('promotor', {title:'Data Promotor',data:rows,keyword:''});});
router.get('/tambah',(req,res)=>{res.render('promotor_tambah',{title:'Tambah Promotor'});});
router.post('/tambah',async (req,res)=>{const {nama,sex,no_hp,noj}=req.body;await pool.query('INSERT INTO promotor (Nama_p,Sex,No_hp,noj) VALUES (?,?,?,?)',[nama,sex,no_hp,noj]);res.redirect('/promotor');});
router.get('/ubah',async (req,res)=>{const {id}=req.query;const [rows]=await pool.query('SELECT * FROM promotor WHERE Id_Pro = ?', [id]);res.render('promotor_ubah',{title:'Ubah Promotor',record:rows[0]});});
router.post('/ubah',async (req,res)=>{const {id,nama,sex,no_hp,noj}=req.body;await pool.query('UPDATE promotor SET Nama_p=?,Sex=?,No_hp=?,noj=? WHERE Id_Pro=?',[nama,sex,no_hp,noj,id]);res.redirect('/promotor');});
router.get('/hapus',async (req,res)=>{const {id}=req.query;await pool.query('DELETE FROM promotor WHERE Id_Pro=?',[id]);res.redirect('/promotor');});
module.exports=router;
