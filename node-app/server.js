const express = require('express');
const path = require('path');
const app = express();
require('dotenv').config();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.use(express.static(path.join(__dirname, 'public')));
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// load routes
app.use('/', require('./routes/index'));
app.use('/tambah', require('./routes/tambah'));
app.use('/ubah', require('./routes/ubah'));
app.use('/hapus', require('./routes/hapus'));
app.use('/solver', require('./routes/solver'));
app.use('/promotor', require('./routes/promotor'));
app.use('/admin', require('./routes/admin'));
app.use('/masalah', require('./routes/masalah'));
app.use('/auth', require('./routes/auth'));
module.exports = app;

if (require.main === module) {
  const PORT = process.env.PORT || 3000;
  app.listen(PORT, () => console.log(`🚀 Server listening on http://localhost:${PORT}`));
}
