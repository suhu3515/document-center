# Project Setup Guide

This guide will walk you through the steps required to set up and run the project.

## Setup Instructions

1. **Download this repository:** 
    - Clone or download the repository from [GitHub](https://github.com/suhu3515/document-center).

2. **Install Dependencies:** 
    - Run the following command in your terminal:
      ```
      composer install
      ```

3. **Rename `.env.example` to `.env`:**
    - Rename the `.env.example` file to `.env`.
    - Update the database details inside the `.env` file.

4. **Run Migrations:**
    - Execute the following command:
      ```
      php artisan migrate
      ```

5. **Seed Default Data:**
    - Run the command:
      ```
      php artisan db:seed
      ```

6. **Link Storage:**
    - Execute:
      ```
      php artisan storage:link
      ```

7. **Run the Project:**
    - Start the server by running:
      ```
      php artisan serve
      ```

8. **Login Credentials:**
    - Username: `admin@gmail.com`
    - Password: `password`
    
9. **Keep Uploading Data:**
    - Access the document center and keep uploading data as required.

## Improvements to Make

1. **Enhance Profile Pages:**
    - Add proper profile pages with template integration and logos.

2. **Change Confirmation Method:**
    - Replace JavaScript `confirm` with more user-friendly dialog boxes or modals.

3. **Add Minimum Date for Date Input:**
    - Implement a minimum date for date inputs to ensure data consistency.

4. **Add JavaScript Validation for File Uploads:**
    - Enhance file upload validation by adding JavaScript validation in addition to server-side validation.
