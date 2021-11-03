# Task
To-Do Web App

- Login
    - Username/Email
    - Validation
- Register
    - Name, Email, Phone, Password
    - Validation
- User type
    - Free: limit create 5 To Do only
    - Premium: unlimited create To Do
- To Do Item
    - Title
    - Description
    - Date
    - Toggle set reminder
- Page
    - Display To Do List
    - Create To Do
    - Edit/Delete To Do
- Middleware
    - When create To Do, block free user from create  when reach limit and redirect to page Upgrade
- Queue (Job)
    - Send reminder to email based on To Do date (if set)
- Event and Listener
    - Each To Do activity, add to log (similar like audit trail log)
- API
    - Login
    - Register
    - Display To Do
    - Create/Edit/Delete

# How to setup

## Step 1 : Install Laragon
### If have apache issues with laragon, changes apache version to Apache httpd 2-4.47 
## Step 2 : Install node.js
## Step 3 : 
``composer install``
## Step 4 : 
`npm install`
## Step 5 :
`npm run dev`
## Step 6 : Open database at Laragon
## Step 7 : Create a new database
## Step 8 : 
`cp .env.example .env`
## Step 9 : 
`php artisan key:generate`
## Step 10 : 
`php artisan passport:install`
## Step 9 : 
`php artisan migrate` 
## Step 11 : 
`php artisan serve`

