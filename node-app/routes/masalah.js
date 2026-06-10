const router = require('express').Router();
const pool = require('../db');

router.get('/', async (req,res)=>{const [rows]=await pool.query('SELECT * FROM tb_masalah');res.render('masalah', {title:'Data Masalah',data:rows,keyword:''});});
router.get('/tambah',(req,res)=>{res.render('masalah_tambah',{title:'Tambah Masalah'});});
router.post('/tambah',async (req,res)=>{const {No_Masalah,Masalah}=req.body;await pool.query('INSERT INTO tb_masalah (No_Masalah,Masalah) VALUES (?,?)',[No_Masalah,Masalah]);res.redirect('/masalah');});
router.get('/ubah',async (req,res)=>{const {id}=req.query;const [rows]=await pool.query('SELECT * FROM tb_masalah WHERE No_Masalah = ?', [id]);res.render('masalah_ubah',{title:'Ubah Masalah',record:rows[0]});});
router.post('/ubah',async (req,res)=>{const {id,No_Masalah,Masalah}=req.body;await pool.query('UPDATE tb_masalah SET No_Masalah=?,Masalah=? WHERE No_Masalah=?',[No_Masalah,Masalah,id]);res.redirect('/masalah');});
router.get('/hapus',async (req,res)=>{const {id}=req.query;await pool.query('DELETE FROM tb_masalah WHERE No_Masalah=?',[id]);res.redirect('/masalah');});
module.exports=router;
