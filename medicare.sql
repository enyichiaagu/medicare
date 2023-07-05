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

CREATE TABLE staff(
	id INT PRIMARY KEY,
    staff_id VARCHAR(20) NOT NULL,
    full_name VARCHAR(125) NOT NULL,
    gender CHAR(30) NOT NULL,
    date_of_birth DATE NOT NULL,
    email_address VARCHAR(255) NOT NULL,
    staff_password VARCHAR(125) NOT NULL,
    phone_no VARCHAR(125) NOT NULL,
    position VARCHAR(125) NOT NULL,
    unit VARCHAR(125) NOT NULL,
    specialty VARCHAR(125)
);

-- INSERT INTO staff(id, staff_id, full_name, gender, date_of_birth, email_address, staff_password, phone_no, position, unit, specialty)
--     VALUES(1, '64a5691cec267', 'Gabriel jessica', 'female', 2002-03-27, 'gabrielj121@yahoo.com', 12341234, 'dietician', 'nutrition and dietetics', 'dietician')
