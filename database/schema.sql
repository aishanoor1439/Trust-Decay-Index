-- Trust Decay Index Database Schema
CREATE DATABASE IF NOT EXISTS trust_decay_index;
USE trust_decay_index;

-- Institutions/Departments Table
CREATE TABLE institutions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category ENUM('utility', 'healthcare', 'education', 'transport', 'municipal') NOT NULL,
    trust_score DECIMAL(5,2) DEFAULT 50.00,
    last_feedback_at TIMESTAMP NULL,
    feedback_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_category (category),
    INDEX idx_trust_score (trust_score)
);

-- Anonymous Feedback Table
CREATE TABLE feedback (
    id INT PRIMARY KEY AUTO_INCREMENT,
    institution_id INT NOT NULL,
    behavior_score TINYINT NOT NULL CHECK (behavior_score BETWEEN 1 AND 10),
    delay_score TINYINT NOT NULL CHECK (delay_score BETWEEN 1 AND 10),
    transparency_score TINYINT NOT NULL CHECK (transparency_score BETWEEN 1 AND 10),
    session_token VARCHAR(64) NOT NULL, -- For rate limiting, not user identification
    calculated_tdi DECIMAL(5,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (institution_id) REFERENCES institutions(id) ON DELETE CASCADE,
    INDEX idx_institution (institution_id),
    INDEX idx_created_at (created_at),
    INDEX idx_session (session_token)
);

-- Trust Score History Table (for decay tracking)
CREATE TABLE trust_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    institution_id INT NOT NULL,
    trust_score DECIMAL(5,2) NOT NULL,
    feedback_count INT NOT NULL,
    calculated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (institution_id) REFERENCES institutions(id) ON DELETE CASCADE,
    INDEX idx_institution_date (institution_id, calculated_at)
);

-- Insert Sample Institutions
INSERT INTO institutions (name, description, category, trust_score) VALUES
('K-Electric', 'Electricity provider for Karachi region', 'utility', 45.00),
('Karachi Water Board', 'Water supply and management', 'utility', 40.00),
('Traffic Police Karachi', 'Traffic management and enforcement', 'municipal', 35.00),
('Sindh Revenue Board', 'Tax collection and revenue department', 'municipal', 50.00),
('Jinnah Hospital', 'Public healthcare facility', 'healthcare', 55.00),
('Karachi University', 'Higher education institution', 'education', 60.00),
('Karachi Transport Corporation', 'Public transportation services', 'transport', 42.00);

-- Create Event for Automatic Trust Decay (runs daily)
DELIMITER $$
CREATE EVENT IF NOT EXISTS decay_trust_scores
ON SCHEDULE EVERY 1 DAY
STARTS CURRENT_TIMESTAMP
DO
BEGIN
    UPDATE institutions i
    LEFT JOIN (
        SELECT institution_id, MAX(created_at) as last_feedback
        FROM feedback
        GROUP BY institution_id
    ) f ON i.id = f.institution_id
    SET i.trust_score = i.trust_score * 0.995 -- Decay by 0.5% daily if no feedback
    WHERE f.last_feedback IS NULL OR f.last_feedback < DATE_SUB(NOW(), INTERVAL 7 DAY);
    
    -- Archive current trust scores
    INSERT INTO trust_history (institution_id, trust_score, feedback_count)
    SELECT id, trust_score, feedback_count FROM institutions;
END$$
DELIMITER ;