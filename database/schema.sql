-- Quantify Database Schema
CREATE DATABASE IF NOT EXISTS quantify;
USE quantify;

-- Master Categories Table
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

-- Services/Companies Table
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
    
    -- New fields for enhanced analytics
    reliability_score DECIMAL(5,2) DEFAULT 50.00,
    cost_efficiency_score DECIMAL(5,2) DEFAULT 50.00,
    safety_score DECIMAL(5,2) DEFAULT 50.00,
    
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    INDEX idx_category (category_id),
    INDEX idx_trust_score (trust_score),
    INDEX idx_active (is_active)
);

-- Updated Anonymous Feedback Table (with new metrics)
CREATE TABLE feedback (
    id INT PRIMARY KEY AUTO_INCREMENT,
    service_id INT NOT NULL,
    
    -- New metrics based on research weights
    safety_score TINYINT NOT NULL CHECK (safety_score BETWEEN 1 AND 10),
    waiting_time_score TINYINT NOT NULL CHECK (waiting_time_score BETWEEN 1 AND 10),
    price_score TINYINT NOT NULL CHECK (price_score BETWEEN 1 AND 10),
    service_quality_score TINYINT NOT NULL CHECK (service_quality_score BETWEEN 1 AND 10),
    app_usability_score TINYINT NOT NULL CHECK (app_usability_score BETWEEN 1 AND 10),
    driver_behavior_score TINYINT NOT NULL CHECK (driver_behavior_score BETWEEN 1 AND 10),
    
    session_token VARCHAR(64) NOT NULL,
    calculated_score DECIMAL(5,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE,
    INDEX idx_service (service_id),
    INDEX idx_created_at (created_at),
    INDEX idx_session (session_token)
);

-- Score History Table
CREATE TABLE score_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    service_id INT NOT NULL,
    trust_score DECIMAL(5,2) NOT NULL,
    feedback_count INT NOT NULL,
    calculated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE,
    INDEX idx_service_date (service_id, calculated_at)
);

-- Decay Log Table (for tracking decay events)
CREATE TABLE decay_log (
    id INT PRIMARY KEY AUTO_INCREMENT,
    service_id INT NOT NULL,
    old_score DECIMAL(5,2) NOT NULL,
    new_score DECIMAL(5,2) NOT NULL,
    hours_since_last_feedback INT NOT NULL,
    decay_multiplier DECIMAL(3,2) NOT NULL,
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE,
    INDEX idx_applied_at (applied_at)
);

-- Insert Categories
INSERT INTO categories (name, display_name, description, icon, display_order) VALUES
('carpool', 'Carpool & Ride Hailing', 'Indrive, Bykea, Yango, Uber, Careem', '🚗', 1),
('ecommerce', 'E-Commerce', 'Daraz, Foodpanda, OLX, AirBnb', '🛒', 2),
('institutions', 'Institutions', 'Hospitals, Universities, Government', '🏛️', 3),
('financial', 'Financial Services', 'Banks, Fintech, Insurance', '💳', 4);

-- Insert Carpool Services with enhanced metrics
INSERT INTO services (category_id, name, description, trust_score, feedback_count, reliability_score, cost_efficiency_score, safety_score) VALUES
(1, 'Indrive', 'Bargain-based ride service', 76.40, 1542, 74.00, 82.00, 71.00),
(1, 'Bykea', 'Motorcycle taxi service', 82.10, 2100, 81.00, 79.00, 68.00),
(1, 'Yango', 'International ride-hailing', 71.80, 923, 69.00, 73.00, 74.00),
(1, 'Uber', 'Global ride sharing', 74.20, 1876, 77.00, 71.00, 75.00),
(1, 'Careem', 'Regional ride hailing', 69.30, 1654, 72.00, 68.00, 70.00);

-- Enhanced Decay Event (Runs every hour)
DELIMITER $$
CREATE EVENT IF NOT EXISTS enhanced_decay_trust_scores
ON SCHEDULE EVERY 1 HOUR
STARTS CURRENT_TIMESTAMP
DO
BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE service_id INT;
    DECLARE last_feedback TIMESTAMP;
    DECLARE current_score DECIMAL(5,2);
    DECLARE hours_diff INT;
    DECLARE decay_mult DECIMAL(3,2);
    
    DECLARE cur CURSOR FOR 
        SELECT s.id, s.trust_score, MAX(f.created_at) as last_feedback
        FROM services s
        LEFT JOIN feedback f ON s.id = f.service_id
        GROUP BY s.id, s.trust_score;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    OPEN cur;
    
    read_loop: LOOP
        FETCH cur INTO service_id, current_score, last_feedback;
        IF done THEN
            LEAVE read_loop;
        END IF;
        
        -- Calculate hours since last feedback
        SET hours_diff = TIMESTAMPDIFF(HOUR, last_feedback, NOW());
        
        -- Apply decay if no feedback in last 72 hours
        IF hours_diff > 72 THEN
            -- 2% decay every 24 hours after 72-hour grace period
            SET decay_mult = 0.98;
            
            -- Update service score
            UPDATE services 
            SET trust_score = current_score * decay_mult,
                updated_at = NOW()
            WHERE id = service_id;
            
            -- Log the decay
            INSERT INTO decay_log (service_id, old_score, new_score, hours_since_last_feedback, decay_multiplier)
            VALUES (service_id, current_score, current_score * decay_mult, hours_diff, decay_mult);
            
            -- Archive to history
            INSERT INTO score_history (service_id, trust_score, feedback_count)
            SELECT id, trust_score, feedback_count FROM services WHERE id = service_id;
        END IF;
    END LOOP;
    
    CLOSE cur;
END$$
DELIMITER ;