# Aplikasi Solver Center – Node.js Migration

## 1. Prerequisites
- **Node.js ≥ 18** (LTS)
- **MySQL / MariaDB 10.4** (dump file: **DataBase/solver_center.sql**)
- **Docker** (opsional, untuk CI)

## 2. Setup
```bash
# 1. Checkout dan masuk ke folder repo
cd C:\xampp\htdocs\AplikasiSolverCenter

# 2. Install dependencies
npm ci

# 3. Konfigurasi database
# a. Buat DB
mysql -u root -p -e "CREATE DATABASE solver_center;"
# b. Import dump
mysql -u root -p solver_center < DataBase/solver_center.sql

# 4. Buat file .env di folder node-app
#    (template di .env.sample)
#    DB_HOST=localhost
#    DB_USER=root
#    DB_PASS=
#    DB_NAME=solver_center
#    PORT=3000
#    JWT_SECRET=supersecretkey

# 5. Jalankan server (dev)
cd node-app
npm run dev
```

## 3. Testing
```bash
npm test                 # run Jest + SuperTest
```

## 4. Build & Deploy
### Docker
```bash
docker build -t solver-center .
docker run -p 3000:3000 solver-center
```
### Heroku / Render
```bash
heroku login
heroku create solver-center
git push heroku main
heroku config:set DB_HOST=localhost DB_USER=root DB_NAME=solver_center JWT_SECRET=supersecretkey
heroku ps:scale web=1
```

## 5. API Endpoints
- `GET /` – list solvee
- `POST /tambah` – tambah solvee
- `GET /ubah?id={}` – form ubah
- `POST /ubah` – update
- `GET /hapus?id={}` – delete
- (Mirip untuk `/solver`, `/promotor`, `/admin`, `/masalah`, `/pegawai`)

### Authentication (JWT)
- `POST /auth/login` – body `{ "Username": "", "Password": "" }` → returns `token`
- `GET /auth/profile` – header `Authorization: Bearer <token>` → user info
- Semua rute CRUD di‑proteksi menggunakan token.

**CURL contoh**
```bash
curl -X POST https://myapp.herokuapp.com/auth/login \
     -d "Username=amoeh&Password=12345" \
     -H "Content-Type: application/x-www-form-urlencoded"
```

## 6. Lint & Formatting
```bash
npm run lint
```

## 7. Release Workflow
```bash
npm version major | minor | patch
git push --follow-tags
```

## 8. Changelog
See [CHANGELOG.md](CHANGELOG.md).

---

### Maintenance
- Pertahankan `npm audit` setiap pull‑request.
- Tambah test ketika refactor.
- Monitor logs dengan `pm2` atau `heroku logs`.
