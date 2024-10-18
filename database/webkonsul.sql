CREATE DATABASE webkonsul;

USE webkonsul;

-- Tabel users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel konsultasi
CREATE TABLE consultations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    consultation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    chat_log TEXT,
    doctor_name VARCHAR(100),
    status ENUM('pending', 'completed') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tabel skrining kesehatan
CREATE TABLE screenings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    screening_date DATE,
    health_info TEXT,
    lab_location VARCHAR(255),
    result_status ENUM('pending', 'done') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tabel pembelian obat
CREATE TABLE purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    medicine_name VARCHAR(255),
    quantity INT,
    price DECIMAL(10,2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'shipped', 'delivered') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);
users