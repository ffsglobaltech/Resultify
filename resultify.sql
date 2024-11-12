-- Create the database
CREATE DATABASE IF NOT EXISTS resultify;
USE resultify;

-- Table for Schools
CREATE TABLE IF NOT EXISTS schools (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    short_name VARCHAR(50) UNIQUE NOT NULL,
    domain VARCHAR(255),
    logo_path VARCHAR(255),
    motto VARCHAR(255),
    address VARCHAR(255),
    subdomain VARCHAR(255),
    country VARCHAR(100),
    state VARCHAR(100),
    city VARCHAR(100),
    contact_email VARCHAR(255),
    contact_phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for System Users (System-wide administrators)
CREATE TABLE IF NOT EXISTS system_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('super_admin', 'system_admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for School Users (School-specific users)
CREATE TABLE IF NOT EXISTS school_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('principal', 'vice_principal', 'teacher', 'parent') NOT NULL,
    gender ENUM('male', 'female'),
    phone_number VARCHAR(20),
    address VARCHAR(255),
    date_of_birth DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (school_id) REFERENCES schools(id)
);

-- Table for Site Settings
CREATE TABLE IF NOT EXISTS site_settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for Sections
CREATE TABLE IF NOT EXISTS sections (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    section_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (school_id) REFERENCES schools(id)
);

-- Table for Classes
CREATE TABLE IF NOT EXISTS classes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    section_id INT,
    class_name VARCHAR(100) NOT NULL,
    form_teacher_id INT,
    assistant_teacher_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (school_id) REFERENCES schools(id),
    FOREIGN KEY (section_id) REFERENCES sections(id),
    FOREIGN KEY (form_teacher_id) REFERENCES school_users(id),
    FOREIGN KEY (assistant_teacher_id) REFERENCES school_users(id)
);

-- Table for Subjects
CREATE TABLE IF NOT EXISTS subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    section_id INT,
    class_id INT,
    subject_name VARCHAR(100) NOT NULL,
    teacher_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (school_id) REFERENCES schools(id),
    FOREIGN KEY (section_id) REFERENCES sections(id),
    FOREIGN KEY (class_id) REFERENCES classes(id),
    FOREIGN KEY (teacher_id) REFERENCES school_users(id)
);

-- Table for Students
CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    student_id VARCHAR(50) UNIQUE NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    other_names VARCHAR(100),
    email VARCHAR(255),
    gender ENUM('male', 'female'),
    date_of_birth DATE,
    state_of_origin VARCHAR(100),
    lga VARCHAR(100),
    weight DECIMAL(5,2),
    height DECIMAL(5,2),
    address VARCHAR(255),
    guardian_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (school_id) REFERENCES schools(id),
    FOREIGN KEY (guardian_id) REFERENCES school_users(id)
);

-- Table for Terms
CREATE TABLE IF NOT EXISTS terms (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    current_term ENUM('first', 'second', 'third') NOT NULL,
    start_date DATE,
    end_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (school_id) REFERENCES schools(id)
);

-- Table for Report Configurations
CREATE TABLE IF NOT EXISTS report_configurations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    term_id INT,
    session VARCHAR(20),
    number_of_subjects INT,
    grade_boundaries TEXT, -- JSON format for custom grade boundaries
    include_traits BOOLEAN DEFAULT TRUE,
    include_psychomotor BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (school_id) REFERENCES schools(id),
    FOREIGN KEY (term_id) REFERENCES terms(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for Scores
CREATE TABLE IF NOT EXISTS scores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    subject_id INT,
    ca1_score DECIMAL(5,2),
    ca2_score DECIMAL(5,2),
    cw_score DECIMAL(5,2),
    hw_score DECIMAL(5,2),
    exam_score DECIMAL(5,2),
    total_score DECIMAL(6,2) GENERATED ALWAYS AS (ca1_score + ca2_score + cw_score + hw_score + exam_score) STORED,
    grade VARCHAR(5),
    comments VARCHAR(255),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for Attendance Records
CREATE TABLE IF NOT EXISTS attendance (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    student_id INT,
    term_id INT,
    days_present INT,
    days_absent INT,
    days_school_open INT,
    FOREIGN KEY (school_id) REFERENCES schools(id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (term_id) REFERENCES terms(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for Form Teacher Remarks
CREATE TABLE IF NOT EXISTS form_teacher_remarks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    student_id INT,
    term_id INT,
    remark TEXT,
    FOREIGN KEY (school_id) REFERENCES schools(id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (term_id) REFERENCES terms(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for Proprietor's Remarks
CREATE TABLE IF NOT EXISTS proprietor_remarks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT,
    student_id INT,
    term_id INT,
    remark TEXT,
    FOREIGN KEY (school_id) REFERENCES schools(id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (term_id) REFERENCES terms(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for Subscription Plans
CREATE TABLE IF NOT EXISTS subscription_plans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    student_limit INT NOT NULL,
    features TEXT,
    duration ENUM('term', 'annual') DEFAULT 'term',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for Subscriptions
CREATE TABLE IF NOT EXISTS subscriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_id INT NOT NULL,
    plan_id INT NOT NULL,
    number_of_students INT,
    start_date DATE,
    end_date DATE,
    status ENUM('active', 'expired', 'pending') DEFAULT 'pending',
    payment_status ENUM('paid', 'unpaid', 'overdue') DEFAULT 'unpaid',
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (school_id) REFERENCES schools(id),
    FOREIGN KEY (plan_id) REFERENCES subscription_plans(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for Invoices
CREATE TABLE IF NOT EXISTS invoices (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subscription_id INT,
    amount DECIMAL(10, 2) NOT NULL,
    due_date DATE,
    status ENUM('paid', 'unpaid', 'overdue') DEFAULT 'unpaid',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (subscription_id) REFERENCES subscriptions(id)
);
