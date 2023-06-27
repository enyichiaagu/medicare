CREATE TABLE patients(
    id INT PRIMARY KEY,
    patient_id VARCHAR(20) NOT NULL,
    full_name VARCHAR(125) NOT NULL,
    gender CHAR(30) NOT NULL,
    date_of_birth DATE NOT NULL,
    phone_no VARCHAR(125) NOT NULL,
    residential_address VARCHAR(255) NOT NULL,
    email_address VARCHAR(255) NOT NULL,
    next_of_kin_name VARCHAR(255) NOT NULL,
    next_of_kin_no VARCHAR(125) NOT NULL,
    existing_medical_conditions VARCHAR(255),
    allergies VARCHAR(255),
    blood_group CHAR(10),
    genotype CHAR(10)
);