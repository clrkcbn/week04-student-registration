# Completion and Submission Guide

This guide covers the evidence that must be produced after the application is installed locally. Do not submit placeholder screenshots or claim that an unperformed step is complete.

## 1. Install and Run

From the project folder in PowerShell:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
```

Create the `student_registration` database in MySQL. Update `.env` with your MySQL username and password, then run:

```powershell
php artisan migrate
php artisan storage:link
php artisan test
php artisan serve
```

Keep the successful test and server output visible for terminal screenshots.

## 2. Capture Required Screenshots

Use clear filenames and crop only irrelevant desktop areas. Do not hide the browser URL when it helps prove the page is running locally.

| Filename | How to produce it |
|---|---|
| `registration-form.png` | Open `/students/register` and capture the complete empty form. |
| `validation-errors.png` | Submit missing/invalid values and capture the error summary and red field messages. |
| `successful-registration.png` | Submit valid information and capture the resulting profile page. |
| `flash-message.png` | Capture the green “Student registered successfully!” banner after submission. |
| `uploaded-profile-picture.png` | Capture the student profile with its uploaded picture visible. |
| `student-profile.png` | Capture the full profile details page. |
| `database-table.png` | Open phpMyAdmin/MySQL Workbench and show the saved row in `students`. Hide passwords. |
| `vscode-project-structure.png` | Show the important folders and files in VS Code Explorer. |
| `terminal-output.png` | Show passing `php artisan test` output and/or the development server. |
| `browser-output.png` | Show the registered-student directory containing at least one record. |
| `github-repository.png` | Show the public GitHub repository and its files. |

Place all images inside `screenshots/`, add them to the README under the Screenshots section, then commit them.

## 3. Record the Demo GIF or Video

Keep the demonstration around 30–60 seconds:

1. Open the registration form.
2. Submit invalid input to show server-side validation.
3. Correct the fields and select a valid profile image.
4. Submit the form.
5. Show the success flash message and profile picture.
6. Return to the student directory and show the saved record.
7. Briefly show the row in the MySQL database.

Use OBS Studio, Canva, Clipchamp, or another screen recorder. Never show `.env`, database passwords, tokens, or private browser tabs.

## 4. Create the GitHub Repository

Create a **public** GitHub repository named `week04-student-registration`. In PowerShell, use your actual repository URL:

```powershell
git init
git branch -M main
git remote add origin https://github.com/YOUR-USERNAME/week04-student-registration.git
```

Make meaningful commits while installing, testing, capturing evidence, or developing. If all source files were copied at once, do not falsely claim that each feature was developed in a separate earlier commit. Ask your instructor whether the provided source may be committed in logical groups.

Suggested accurate groupings include:

```text
chore: initialize Laravel project structure
feat: add student model and database migration
feat: add student routes and controller
feat: implement student registration validation
feat: build responsive registration form
feat: implement public profile image storage
feat: add student directory and profile page
test: add student registration feature tests
docs: add technical diagrams and reflection
docs: add verified screenshots and demo link
```

Push after the commits are ready:

```powershell
git push -u origin main
```

## 5. Publish the LinkedIn Portfolio Post

Open `documentation/linkedin-post.md`, replace all italic placeholders, attach the demo and screenshot, paste the public GitHub link, and publish it. Read the post once to ensure it describes work you actually completed.

## 6. LMS Submission Checklist

- [ ] Registration form works
- [ ] Required and invalid values are rejected
- [ ] Duplicate Student ID and email are rejected
- [ ] Success flash message appears
- [ ] JPG/JPEG/PNG upload works and files over 2 MB are rejected
- [ ] Student record appears in MySQL
- [ ] Profile page displays the uploaded image and data
- [ ] `php artisan test` passes
- [ ] Public repository is named correctly
- [ ] Repository contains at least 10 meaningful commits
- [ ] README contains all required sections
- [ ] Three diagram files are in `documentation/`
- [ ] All genuine screenshots are in `screenshots/`
- [ ] LinkedIn post contains the demo, screenshot, reflection, and repository link
- [ ] GitHub repository and LinkedIn post URLs are submitted to LMS
