# AGENTS.md

**Purpose**
---
This file contains concise, high‑signal guidance for agents interacting with the PHP web application hosted in this repository.  It highlights setup steps, run commands, file locations, and quirks that are not obvious from the file names.

## Environment
- PHP ≥ 7.4 (the dump specifies PHP 7.4.3).
- MySQL/MariaDB 10.4+ (the `solver_center.sql` dump was generated from 10.4.11).
- Web server (Apache/XAMPP, Nginx, or PHP built‑in server).  The application expects to be served from the project root, e.g. `C:\xampp\htdocs\AplikasiSolverCenter`.

## Database setup
1. Create a database named **solver_center**:
   ```bash
   mysql -u root -p -e "CREATE DATABASE solver_center;"
   ```
2. Import the schema and seed data:
   ```bash
   mysql -u root -p solver_center < DataBase/solver_center.sql
   ```
3. Verify connection in `SolverCenter/koneksi.php`.  If you change MySQL credentials, update the `mysqli_connect("localhost", "root", "", "solver_center");` line.

## Running the application
- **XAMPP**: Put this repository under XAMPP’s `htdocs` folder (e.g., `C:\xampp\htdocs\AplikasiSolverCenter`).  Start Apache, then navigate to `http://localhost/AplikasiSolverCenter/SolverCenter/Index.php`.
- **PHP built‑in server** (for quick local dev):
  ```bash
  php -S localhost:8000 -t SolverCenter
  ```
  Then open `http://localhost:8000/Index.php`.

## File Layout
- `SolverCenter/` – all PHP pages that provide the web interface.
- `DataBase/solver_center.sql` – dump containing schema and initial data.
- `opencode.json` – repository‑level OpenCode configuration (if present).

## Known quirks
- The application uses **mysqli** and hard‑coded credentials; there is no ORM.
- No automated test suite exists.  Manual testing is performed by interacting with the admin pages.
- All pages include `functions.php` for database helpers; if you add new pages, remember to `require 'functions.php';` at the top.

## Contributor notes
- When adding new database tables, remember to adjust `koneksi.php` if you need additional tables or indexes.
- For any future CI integration, consider adding a PHP lint or a simple unit test harness.

---

*Feel free to augment or trim this file as the project evolves.*
