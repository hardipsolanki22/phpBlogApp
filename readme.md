# PHP Blog Application

A simple and elegant blog website built with PHP and MySQL database. This project was developed as a college semester 5 project, featuring a complete blog management system with user functionality.

![Blog Application](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

## 🖼️ Application Screenshots

### Homepage - Desktop View
![Homepage Desktop](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(560).png)
*Main homepage showing blog posts with clean layout and navigation. Users can see all published blog posts with author information and post previews.*

### Homepage - Mobile Responsive View  
![Homepage Mobile](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(564).png)
*Mobile-optimized view of the homepage with responsive navigation menu, ensuring great user experience across all devices.*

### User Registration Page
![User Registration](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(558).png)
*User registration form with fields for username, email, and password. Clean and simple signup process for new users.*

### User Login Page
![User Login](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(557).png)
*User login interface with email and password fields. Includes link to registration page for new users.*

### Create Blog Post Form
![Create Blog Post](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(559).png)
*Blog post creation form where users can write new posts with title, description, and image upload functionality.*

### Blog Post Details - Desktop
![Blog Post Details Desktop](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(562).png)
*Individual blog post view showing full content, author information, and delete functionality for post owners.*

### Blog Post Details - Mobile
![Blog Post Details Mobile](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(563).png)
*Mobile view of individual blog post with responsive design maintaining readability and functionality on smaller screens.*

### User Dashboard Navigation
![User Dashboard](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(561).png)
*User navigation showing logged-in state with options like Home, Create Blog, My Blog, and Logout functionality.*

### User Authentication Flow
![Authentication](https://github.com/hardipsolanki22/phpBlogApp/blob/96fcd2a08cb3372a0cee6845c7384f15e3c08f67/screenshots/Screenshot%20(558).png)
*Login/Signup navigation for guest users, providing easy access to authentication features.*

## 🚀 Features

### User Features
- **User Registration & Login**: Account creation and authentication system with secure login/logout functionality
- **Blog Post Viewing**: Browse and read all published blog posts with pagination and search capabilities
- **Create New Blog Post**: Registered users can create and publish their own blog posts with rich text editor
- **Edit & Update Posts**: Users can edit and update their own published blog posts anytime
- **My Blog Posts**: Personal dashboard where users can view all their created blog posts in one place
- **Post Management**: Users can delete their own blog posts if needed
- **Image Upload**: Upload and attach images to blog posts for better visual content
- **Responsive Design**: Mobile and tablet friendly interface that works across all devices

## 🛠️ Technologies Used

| Technology | Purpose |
|------------|---------|
| **PHP** (61.4%) | Server-side scripting and backend logic |
| **CSS** (30.0%) | Styling and responsive design |
| **JavaScript** (8.6%) | Client-side interactivity |
| **MySQL** | Database management system |
| **HTML5** | Structure and markup |
| **XAMPP** | Local development environment |

## 📋 Prerequisites

Before running this application, make sure you have:

- **XAMPP/WAMP/LAMP** installed on your system
- **PHP 7.4+** or higher
- **MySQL 5.7+** or higher
- **Web browser** (Chrome, Firefox, Safari, etc.)
- **Git** (for cloning the repository)

## 🔧 Installation & Setup

### 1. Clone the Repository

### 2. Setup XAMPP Environment

1. **Start XAMPP Control Panel**
2. **Start Apache** and **MySQL** services
3. **Copy project folder** to `C:\xampp\htdocs\` (Windows) or `/opt/lampp/htdocs/` (Linux)

### 3. Database Configuration

1. **Open phpMyAdmin**: Go to `http://localhost/phpmyadmin`
2. **Create Database**:
   - Click "New" to create a new database
   - Name it `blog_db` or as per your configuration
3. **Import Database**:
   - Look for `database.sql` file in the project
   - Import it using phpMyAdmin import feature

### 4. Configure Database Connection

Update the database configuration in your PHP files:

### 5. Run the Application

1. **Access the application**: `http://localhost/phpBlogApp/`
2. **Register/Login**: Create a new account or login to start blogging