-- Logan Public Library - database schema
-- Member 2 (Jiss): database layer

CREATE DATABASE IF NOT EXISTS logan_library_db;
USE logan_library_db;

CREATE TABLE IF NOT EXISTS books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    author VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    year INT,
    status ENUM('Available', 'Borrowed') NOT NULL DEFAULT 'Available',
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- users table (needed by Member 3's login/register/roles pages)
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'member') NOT NULL DEFAULT 'member',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- same books shown on Member 1's demo catalogue data, now as real rows
INSERT INTO books (title, author, category, year, status, image) VALUES
('The Great Adventure', 'Emily Carter', 'Fiction', 2024, 'Available', 'resources/images/book1.jpeg'),
('Learning Through Discovery', 'James Wilson', 'Education', 2023, 'Available', 'resources/images/book2.jpeg'),
('The World Around Us', 'Sarah Brown', 'Children', 2022, 'Available', 'resources/images/book3.jpeg'),
('Digital Skills for Everyone', 'Michael Smith', 'Technology', 2024, 'Borrowed', 'resources/images/book4.jpeg'),
('Stories Under the Stars', 'Olivia Martin', 'Fiction', 2021, 'Available', 'resources/images/book5.jpeg'),
('Introduction to Science', 'Daniel Taylor', 'Education', 2023, 'Available', 'resources/images/book6.jpeg');
