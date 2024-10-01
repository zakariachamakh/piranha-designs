## Features

### Admin Features:

- **Staff Management:**
    - Add new staff members.
    - View a list of all staff members.
    - Edit staff details (name, email, status).
    - Soft delete staff members.

- **Policy Management:**
    - View all policies assigned to a specific staff member.
    - Assign new policies to staff.
    - Remove policies from staff members.

### Staff Features:

- **Dashboard:**
    - View assigned policies.
    - View details of individual policies.

---

## Installation & Setup

### Requirements

- PHP 8.3+
- Composer
- MySQL

### Step 1: Clone the repository

```bash
git clone https://github.com/your-repo/staff-management-system.git
cd staff-management-system
```

### Step 2: Install dependencies

```bash
composer install
npm install
```

### Step 3: Set up environment variables

Copy the ``.`env`.example`` to `.env` and configure your database and mail settings:

```bash
cp .env.example .env
php artisan key:generate

//.env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 4: Database migration

Run the migrations to set up the database structure:

```bash
php artisan migrate
```

### Step 5: Seed the database

To seed users and policies, run:

```bash
php artisan db:seed
```

### Step 6: Start the application

To seed users and policies, run:

```bash
php artisan serve
```

## ERD (Entity Relationship Diagram)

### Tables:

#### Users

- **id**: Primary Key
- **name**: Staff member's name
- **email**: Staff member's email
- **password**: Staff member's password (hashed)
- **role**: Role (admin or staff)
- **status**: Status (active or invitation_sent)

#### Policies

- **id**: Primary Key
- **code**: Unique policy code
- **plan_reference**: Reference for the plan
- **first_name**: Policy holder's first name
- **last_name**: Policy holder's last name
- **investment_house**: Investment house associated with the policy
- **last_operation**: Date of the last operation
- **staff_user_id**: Foreign Key (nullable), links to the `users` table (assigned staff)

### Relationships:

- **One-to-Many**: One staff member can be assigned multiple policies, but each policy can only be assigned to one staff
  member at a time.

## Admin:

### Login & Dashboard:

- Upon login, admins are redirected to the staff management dashboard.

### Staff List & Management:

- Admins can view all staff members with options to add, edit, or delete staff.

### Policy Assignment:

- Admins can assign available policies to staff members.

### Soft Deletion of Staff:

- Admins can soft delete staff, which also unlinks any assigned policies.

---

## Staff:

### Dashboard:

- Staff users can view their assigned policies.

### Policy Details:

- Staff users can view detailed information about each policy.

---

## Routes:

### Admin Routes:

- **GET** `/admin/staff`: View all staff.
- **POST** `/admin/staff/store`: Add new staff.
- **GET** `/admin/staff/{id}/policies`: View policies assigned to a staff member.
- **POST** `/admin/staff/{id}/policies/add`: Assign a policy to a staff member.
- **DELETE** `/admin/staff/{id}/policies/{policy_id}/remove`: Remove a policy from a staff member.

### Staff Routes:

- **GET** `/staff/dashboard`: View dashboard with assigned policies.
- **GET** `/staff/policy/{id}`: View policy details.


