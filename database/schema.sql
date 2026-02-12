-- Quantify Database Schema
CREATE DATABASE IF NOT EXISTS quantify;
USE quantify;

-- Master Categories Table (For multi-module expansion)
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    display_name VARCHAR(100) NOT NULL,
    description TEXT,
    icon VARCHAR(50) DEFAULT '🔵',
    is_active BOOLEAN DEFAULT TRUE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_active (is_active),
    INDEX idx_order (display_order)
);

-- Services/Companies Table (Works for ANY module)
CREATE TABLE services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    logo_url VARCHAR(255),
    description TEXT,
    website VARCHAR(255),
    trust_score DECIMAL(5,2) DEFAULT 50.00,
    feedback_count INT DEFAULT 0,
    last_feedback_at TIMESTAMP NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    INDEX idx_category (category_id),
    INDEX idx_trust_score (trust_score),
    INDEX idx_active (is_active)
);

-- Anonymous Feedback Table (Universal design)
CREATE TABLE feedback (
    id INT PRIMARY KEY AUTO_INCREMENT,
    service_id INT NOT NULL,
    behavior_score TINYINT NOT NULL CHECK (behavior_score BETWEEN 1 AND 10),
    delay_score TINYINT NOT NULL CHECK (delay_score BETWEEN 1 AND 10),
    transparency_score TINYINT NOT NULL CHECK (transparency_score BETWEEN 1 AND 10),
    session_token VARCHAR(64) NOT NULL,
    calculated_score DECIMAL(5,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE,
    INDEX idx_service (service_id),
    INDEX idx_created_at (created_at),
    INDEX idx_session (session_token)
);

-- Score History Table (For decay tracking)
CREATE TABLE score_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    service_id INT NOT NULL,
    trust_score DECIMAL(5,2) NOT NULL,
    feedback_count INT NOT NULL,
    calculated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE,
    INDEX idx_service_date (service_id, calculated_at)
);

-- Insert Categories (Modules)
INSERT INTO categories (name, display_name, description, icon, display_order) VALUES
('carpool', 'Carpool & Ride Hailing', 'Indrive, Bykea, Yango, Uber, Careem', '🚗', 1),
('ecommerce', 'E-Commerce', 'Daraz, Foodpanda, OLX, AirBnb', '🛒', 2),
('institutions', 'Institutions', 'Hospitals, Universities, Government', '🏛️', 3),
('financial', 'Financial Services', 'Banks, Fintech, Insurance', '💳', 4);

-- Insert Carpool Services (Module 1 - Prototype)
INSERT INTO services (category_id, name, description, trust_score, feedback_count) VALUES
(1, 'Indrive', 'Bargain-based ride service', 78.50, 1250),
(1, 'Bykea', 'Motorcycle taxi service', 82.30, 2100),
(1, 'Yango', 'International ride-hailing', 71.20, 850),
(1, 'Uber', 'Global ride sharing', 74.60, 3200),
(1, 'Careem', 'Regional ride hailing', 69.80, 2800);

-- Insert Sample E-Commerce (For future expansion)
INSERT INTO services (category_id, name, description, trust_score, feedback_count, is_active) VALUES
(2, 'Daraz', 'Online marketplace', 65.40, 4500, FALSE),
(2, 'Foodpanda', 'Food delivery', 72.10, 3800, FALSE),
(2, 'OLX', 'Classifieds platform', 58.90, 1200, FALSE);

-- Create Event for Automatic Trust Decay (Runs daily)
DELIMITER $$
CREATE EVENT IF NOT EXISTS decay_trust_scores
ON SCHEDULE EVERY 1 DAY
STARTS CURRENT_TIMESTAMP
DO
BEGIN
    -- Decay scores by 0.5% if no feedback in 7 days
    UPDATE services s
    LEFT JOIN (
        SELECT service_id, MAX(created_at) as last_feedback
        FROM feedback
        GROUP BY service_id
    ) f ON s.id = f.service_id
    SET s.trust_score = s.trust_score * 0.995
    WHERE f.last_feedback IS NULL 
       OR f.last_feedback < DATE_SUB(NOW(), INTERVAL 7 DAY);
    
    -- Archive current scores
    INSERT INTO score_history (service_id, trust_score, feedback_count)
    SELECT id, trust_score, feedback_count FROM services;
END$$
DELIMITER ;