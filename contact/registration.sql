
-- Create table to store registration details
CREATE TABLE IF NOT EXISTS registration_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    birthday DATE NOT NULL,
    email_id VARCHAR(100) NOT NULL,
    mobile_number VARCHAR(20) NOT NULL,
    birth_place VARCHAR(100) NOT NULL,
    height VARCHAR(10) NOT NULL,
    weight VARCHAR(10) NOT NULL,
    address VARCHAR(255),
    current_address VARCHAR(255),
    education VARCHAR(100) NOT NULL,
    occupation VARCHAR(100) NOT NULL,
    income VARCHAR(50) NOT NULL,
    father_name VARCHAR(100),
    father_occupation VARCHAR(100),
    father_income VARCHAR(50)
);
