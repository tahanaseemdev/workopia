# Workopia

Workopia is a full-featured job board platform built with the Laravel framework. It provides a comprehensive solution for job seekers to find opportunities and for employers to post and manage job listings. Users can register, search for jobs by keywords and location, apply for positions with resume uploads, and bookmark their favorite listings. Employers have a dedicated dashboard to manage their job posts and review applications.

## Features

-   **User Authentication:** Secure registration, login, and session management for users.
-   **Job Listings CRUD:** Employers can create, read, update, and delete job listings.
-   **Employer Dashboard:** A central place for employers to view and manage their job listings and see all applicants for each position.
-   **Advanced Job Search:** Users can search for jobs using keywords and location filters.
-   **Job Application System:** Authenticated users can apply for jobs, including uploading a PDF resume.
-   **Email Notifications:** Employers receive an email notification with the applicant's details and attached resume upon a new application.
-   **Job Bookmarking:** Users can save or bookmark jobs for later viewing.
-   **Profile Management:** Users can update their profile information, including name, email, and avatar.
-   **Responsive UI:** Built with Tailwind CSS and Alpine.js for a modern, responsive user experience on all devices.

## Tech Stack

-   **Backend:** Laravel, PHP
-   **Frontend:** Blade, Tailwind CSS, Alpine.js
-   **Database:** MySQL
-   **Development Tools:** Vite, Composer, NPM

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   A database server (MySQL)

### Installation

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/tahanaseemdev/workopia.git
    cd workopia
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install NPM dependencies:**
    ```bash
    npm install
    ```

4.  **Setup environment file:**
    Create a `.env` file by copying the example file.
    ```bash
    cp .env.example .env
    ```

5.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

6.  **Configure your database:**
    Update the `DB_*` variables in your `.env` file with your database credentials.

7.  **Run database migrations and seed the database:**
    This will create all necessary tables and populate them with sample data, including a test user.
    ```bash
    php artisan migrate --seed
    ```
    A test user will be created with the following credentials:
    -   **Email:** `test@test.com`
    -   **Password:** `test1234`

8.  **Link the storage directory:**
    ```bash
    php artisan storage:link
    ```

9.  **Start vite for hot reloading:**
    ```bash
    npm run dev
    ```

10. **Start the development server:**
    ```bash
    php artisan serve
    ```
    The application will be available at `http://127.0.0.1:8000`.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).