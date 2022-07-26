# Webdevforus - Back Office System

Project ini dibuat untuk keperluan penugasan pada proses rekrutmen di Webdevforus. Project dibuat menggunakan Laravel 9 dan Menggunakan Breeze Starter. Styling menggunakan Bootstrap 5 dan template dari BootstrapMade.

First, install required dependencies & run the development server:

## Documentation

To run this project, you will need to add the following environment variables to your .env file

`DB_DATABASE`

Run CLI

`composer install`

Migrate & Seed Database

`php artisan migrate:fresh --seed`

Link storage
`php artisan storage:link`

Start Server

`php artisan serve`

Then open in the browser

The Default User for Admin Role is

`email: admin@gmail.com`

`password: password`

The Default User for Member Role is

`email: member@gmail.com`

`password: password`

## Features

- Login Page 
- Dashboard
    - Profile Page
    - Change Password Page
- Admin
    - Users Management
    - Groups Management
    - Members Management
    - Import Members By Excel
- Member
    - Profile Management
- API
    - Authenticate User
    - Get member detail by id
