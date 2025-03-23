# Laravel To-Do Application

A simple and efficient to-do application built with Laravel. This application allows users to register, log in, create tasks, mark tasks as completed, and delete tasks. It also includes pagination and session-based notifications.

Database file in the "DB" folder Database name is "todoapp"

## Features

- **User Authentication**:
  - Register and log in with email and password.
  - Log out functionality.
- **Task Management**:
  - Add new tasks with a title, description, and deadline.
  - Mark tasks as completed.
  - Delete tasks.
- **Pagination**:
  - Tasks are paginated for better organization.
- **Session Notifications**:
  - Success and error messages for user actions.
- **Responsive Design**:
  - Works seamlessly on all devices.

## Technologies Used

- **Backend**: Laravel (PHP)
- **Frontend**: Bootstrap, Blade Templates
- **Database**: MySQL (or any supported database)
- **Tools**: Composer, Node.js (for frontend assets)

---

## Installation and Setup

Follow these steps to set up and run the application locally.

### Prerequisites

- PHP (>= 8.0)
- Composer
- Node.js (for frontend assets)
- MySQL (or any supported database)

### Step 1: Clone the Repository

```bash
git clone <repository-url>
cd <project-folder>

### Step 2: Install Dependencies

    composer 
    node js

### import database to the xampp

    database name: "todoapp"


### Step 5: Run the Application

Start the Laravel development server:
using terminal
    "php artisan serve"
Open your browser and navigate to:
    "http://localhost:8000"


Usage
Register/Login:

Navigate to /register to create a new account.
    Log in using your credentials at /login.

Add Tasks:
Click the "Add Task" button to create a new task.
    Provide a title, description, and deadline.

Mark Tasks as Completed:
    Click the checkmark icon to mark a task as completed.


Delete Tasks:
    Click the trash icon to delete a task.

Log Out:
    Use the "Log-out" button to log out of the application.
