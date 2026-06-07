# Web Final Exam Assignment 3

## Project Overview

This repository contains a set of PHP web applications built as part of a final exam project. It includes four separate apps plus a root dashboard and a database setup page.

## Apps Included

1. **Session Visit Counter** (`Question1_Session_Visits`)
   - Tracks page visit counts in the current session.
   - Includes Home, Contact, and Services pages.
   - Uses PHP sessions to store counts.

2. **NUML Library Management** (`Question2_NUML_Library`)
   - Student book borrowing system with registration, login, and record management.
   - Uses PDO and SQLite for data storage.
   - Includes student registration, login, list, edit, and delete functionality.

3. **Product MVC App** (`Question4_Product_MVC`)
   - Demonstrates a simple PHP MVC architecture.
   - Supports creating, listing, and viewing products.
   - Uses SQLite for persistent storage.

4. **Font Settings Manager** (`Question5_Font_Settings`)
   - Saves font size and color preferences in the session.
   - Applies settings across style preview and contact pages.

## Root Dashboard

The repository includes a root dashboard page at:

- `http://localhost:8004/index.php`

This page links to all four apps and includes a `Run Database Setup` button.

## Database Setup

The root `setup.php` page creates the required database and tables:
- `NUML_Library` database
- `Books_borrowed` table
- `products` table

Open:

- `http://localhost:8004/setup.php`

## Run Locally

From the project root, run a PHP server for the root dashboard:

```powershell
cd "C:\Users\Hp\Downloads\Web_Final_Exam\Assignment#3, 9248934, Muhammad Abdullah"
php -S localhost:8004
```

Then open:

- `http://localhost:8004/index.php`

To run each app separately:

```powershell
cd "Question1_Session_Visits"
php -S localhost:8001

cd "Question2_NUML_Library"
php -S localhost:8002

cd "Question4_Product_MVC"
php -S localhost:8000

cd "Question5_Font_Settings"
php -S localhost:8003
```

## Recommended GitHub Repo Name

If you want a more recruiter-friendly repository name, consider renaming the repo to:

- `web-final-exam-assignment3`

or split into separate repos with descriptive names like:

- `session-visit-counter`
- `numl-library-management`
- `product-mvc-app`
- `font-preference-manager`

## Notes

- The project has been validated and the main local servers are working.
- The repository remote is currently configured as `https://github.com/muhammadabdullah071/custom-web.git`.
