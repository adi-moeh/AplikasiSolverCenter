# Product Requirements Document

## Project Overview

The **Aplikasi Solver Center** is a PHP‑based web application that manages solvees, solvers, promotor, admin, problems, and positions. The goal for the next release is to **migrate the entire codebase from PHP to a modern Node.js + Express stack** while keeping existing data and business logic intact.

## Scope

1. Replace PHP pages with mirrored Express routes and EJS views.
2. Preserve database schema (`solver_center.sql`) – no schema changes.
3. Keep CRUD operations, search, and relationships exactly the same.
4. Provide a minimal development environment:
   - Node 18+ (LTS)
   - MySQL 10.4+ (client‑side, same as current)
   - NPM scripts for start, dev, lint.
5. Guarantee backward‑compatible URLs – the original route paths (e.g. `/` for `Index.php`, `/tambah` for `tambah.php`) remain unchanged.

> **Out of scope:**
> - Client‑side SPA rewrite.
> - Adding authentication or PWA features.
> - Unit‑oriented testing.

## High‑Level Architecture

```
frontend (ejs) <-- Express routes
    |            |-- App Routes
    |            |-- View templates
    |            |-- Static assets
backend (node)    |-- DB connection (mysql2, pool)
    |-- Express server (port
            config from .env)
```

*Every PHP file becomes an Express **route module** (`routes/*.js`) and a corresponding **EJS view** (`views/*.ejs`).*

## Features

| Feature | Description | Acceptance Criteria |
|--------|-------------|---------------------|
| Data listing | Show all entries for each domain (solvee, solver, etc.) | Page renders table with all rows; pagination optional but not required |
| CRUD | Create, read, update, delete records | Forms for each entity link to appropriate route; server‑side validation on required fields |
| Search | Keyword search on `Nama` field of solvee | No results return empty table; results displayed in order of entry |
| Data integrity | Foreign keys handled by MySQL; app will fail if violation occurs | Errors returned to user with friendly message |
| API stability | Existing URLs pattern preserved | Browser navigation to old URLs still works |

## Non‑Functional Requirements

- **Performance**: Response time under 200 ms for CRUD routes. Tests performed with small dataset.
- **Security**: Inputs sanitized via `mysql2` placeholders. No user authentication for now.
- **Maintainability**: Use ESLint and Prettier for code quality.
- **Scalability**: Use connection pooling (`mysql2/promise`).
- **Deployment**: Must run on Windows (XAMPP removed) and Linux. Use `pm2` or systemd for production.

## Deliverables

1. A **`node-app`** directory with the full Express implementation.
2. Copy of original `DataBase/solver_center.sql` (no changes).
3. `README.md` updated to reflect new installation steps.
4. `PRD.md` (this file) and `CODE_OF_CONDUCT.md` for new repo structure.
5. Test instructions (manual UI testing list).

## Timeline (2‑Week Sprint)

| Day | Task | Owner | Notes |
|----|------|-------|------|
| 1 | Set up folder, init npm, install deps | dev | create `node-app` | 
| 2 | Configure dotenv & database pool | dev | `db.js` | 
| 3 | Implement root route (`/`) + `index.ejs` | dev | CRUD table | 
| 4 | Implement routes: `tambah`, `ubah`, `hapus` | dev | reuse logic | 
| 5 | Duplicate for `solver`, `promotor`, `admin`, `masalah`, `jabatan` | dev | test redirects | 
| 6 | Add static assets folder; copy CSS | dev | minimal styling | 
| 7 | Set up ESLint, Prettier | dev | commit lint config | 
| 8 | Update README & commit PR | dev | after final tests | 
| 9 | System test on Windows + Docker (optional) | qa | regression check | 
| 10 | Review & merge PR | team | requirement satisfied | 

## Acceptance Criteria

1. Open the application in the browser (`http://localhost:3000/`).
2. All CRUD screens accessible via preserved URLs.
3. Data inserted, updated, and deleted persist in MySQL.
4. Search keyword returns correct filtered results.
5. No broken links or errors on page load.
6. Lint passes (`npm run lint`).
7. Code follows Project’s coding style guidelines.

## Success Metrics

- **User coverage**: 100 % of original PHP pages replaced.
- **Performance**: Page load < 200 ms (measured via Chrome DevTools).
- **Security**: No SQL injection through parameterized queries.
- **Adoption**: Team member can run app locally with `npm run dev` without additional configuration.

---

Prepared by **OpenCode Agent** – Path: `AplikasiSolverCenter/PRD.md`.
