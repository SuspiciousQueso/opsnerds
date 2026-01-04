# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project Overview

OpsNerds is a lightweight, income-first web application for on-demand IT support connecting people with IT professionals for remote tech support. The project follows a "human-first support" philosophy with:

- Fast triage and resolution over complex workflows
- Simple, understandable UX for non-technical users
- Minimal features, no overengineering
- Built to generate revenue early, not to be "perfect"

This is currently an MVP with an intentionally small and pragmatic scope.

## Development Environment

### Starting the Application

```powershell
# Start all services (PHP-FPM, MariaDB, Caddy)
docker compose up -d

# Stop all services
docker compose down

# View logs
docker compose logs -f

# Rebuild after Dockerfile changes
docker compose up -d --build
```

The application will be available at: https://ops.mspguild.tech (configured in Caddyfile)

### Database Access

```powershell
# Access MariaDB shell
docker compose exec db mariadb -u opsnerds -p

# Run migrations (automatic on first startup via docker-entrypoint-initdb.d)
# Migrations are in /migrations directory and run alphabetically on database initialization
```

### Environment Configuration

Database credentials are stored in `.env` (not tracked in git):
- DB_NAME, DB_USER, DB_PASSWORD, DB_ROOT_PASSWORD
- These are injected into both PHP and MariaDB containers via compose.yaml

## Architecture

### Technology Stack

- **Backend**: PHP 8.3-FPM (Alpine)
- **Database**: MariaDB (latest)
- **Web Server**: Caddy (handles HTTPS, compression, static files, PHP-FPM proxying)
- **Containerization**: Docker Compose

### Directory Structure

```
opsnerds/
├── config/          # Application configuration (DB credentials, app settings)
├── docker/          # Docker configuration files
│   ├── php/         # PHP Dockerfile
│   └── nginx/       # (Legacy - not currently used, Caddy is active)
├── migrations/      # Database schema migrations (run on container init)
├── public/          # Web root - only this directory is publicly accessible
│   └── index.php    # Front controller with routing
├── src/             # Business logic controllers
│   ├── AuthController.php
│   ├── Database.php
│   ├── JobController.php
│   ├── ProfileController.php
│   └── SupportRequestController.php
└── views/           # HTML/PHP view templates
```

### Request Flow

1. **Caddy** receives request on port 80/443
2. Static files served directly from `/public`
3. PHP requests routed to **PHP-FPM** container via `php_fastcgi php:9000`
4. **index.php** (front controller) loads based on `?action=` query parameter
5. Routes in switch/case dispatch to appropriate **Controller**
6. Controller uses **Database singleton** for data access (PDO with prepared statements)
7. Controller includes **View** template from `/views`

### Routing System

Simple query-parameter based routing via `index.php`:
- Pattern: `index.php?action=ACTION_NAME`
- Examples:
  - `?action=register` → AccountCreationForm.php view
  - `?action=do_register` → AuthController::register()
  - `?action=browse_jobs` → JobController::index()
  - `?action=view_job&id=123` → JobController::view()

### Authentication & Sessions

- Session-based authentication (server-side PHP sessions)
- Session security enabled: httponly cookies, use_only_cookies
- Protected routes check `$_SESSION['user_id']` and redirect to login if not set
- User roles: 'seeker', 'poster', 'both' (stored in `$_SESSION['user_role']`)

### Database Layer

**Database.php** implements singleton pattern:
```php
$db = Database::getInstance(); // Returns PDO connection
```

Configuration loaded from environment variables with fallbacks:
- DB_HOST (default: 'db')
- DB_NAME (default: 'opsnerds')
- DB_USER (default: 'opsnerds')
- DB_PASS (default: 'opsnerds')

PDO configured with:
- `ERRMODE_EXCEPTION` for error handling
- `FETCH_ASSOC` as default fetch mode
- `EMULATE_PREPARES => false` for true prepared statements

### Data Model

**users** - User accounts with authentication
- Roles: seeker (looking for work), poster (posting jobs), both
- Contains: email, password_hash, role, full_name, bio, display_name

**jobs** - Job postings
- Posted by users with 'poster' or 'both' role
- Fields: title, category, description, budget
- Status: open, in_progress, completed, cancelled

**job_applications** - Applications to jobs
- Links seekers to jobs
- Contains cover_letter, status (submitted, reviewed, accepted, rejected)
- Unique constraint: one application per user per job

**work_experience** - User work history (for seekers)

**projects** - User portfolio projects (for seekers)

**support_requests** - Original MVP feature (may be legacy)
- For IT support request submissions

**conversations / conversation_users / messages** - Messaging system (planned/partial)

## Development Guidelines

### Core Philosophy

> "Prefer clarity over cleverness. Comment non-obvious logic. Avoid premature abstractions. Always ask before introducing major new concepts."

### Security Practices

1. **Always use prepared statements** - all database queries use PDO prepared statements
2. **Input validation** - sanitize email with `FILTER_SANITIZE_EMAIL`, trim all user input
3. **Session security** - httponly, secure cookies (when HTTPS), no session fixation
4. **Password hashing** - use `password_hash()` with PASSWORD_DEFAULT
5. **Route protection** - check `$_SESSION['user_id']` before accessing protected resources

### Code Patterns

**Controllers**: Handle request processing and coordinate between models/views
- Named `*Controller.php`
- Instantiated on-demand in routing logic
- Methods handle specific actions

**Views**: PHP templates with embedded HTML
- Located in `/views`
- Included directly from controllers or routing logic
- Access data via variables set before include

**No ORM**: Direct PDO queries with prepared statements throughout

### Adding New Features

1. **Database Changes**: Add numbered migration SQL file in `/migrations` (e.g., `008_create_*.sql`)
2. **New Routes**: Add case to switch statement in `public/index.php`
3. **New Controller**: Create in `/src`, follow existing patterns
4. **New View**: Create PHP file in `/views`, keep HTML clean and minimal

## Common Issues

### Database Connection Failures

Ensure `.env` file exists with correct credentials and containers are running. The PHP container depends on DB container being healthy.

### Migrations Not Applied

Migrations only run on fresh database initialization. To reapply:
```powershell
docker compose down -v  # Remove volumes
docker compose up -d     # Recreate with fresh DB
```

### Session Issues

Sessions rely on PHP-FPM container having writable session directory and consistent session.cookie_* settings across requests.

### Routing Not Working

All routes depend on `?action=` query parameter. Missing 'home' case in switch falls through to default behavior.
