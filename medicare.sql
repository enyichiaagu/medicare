CREATE TABLE patients(
    id INT PRIMARY KEY AUTO_INCREMENT,
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
	id INT PRIMARY KEY AUTO_INCREMENT,
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

CREATE TABLE appointments(
    id INT PRIMARY KEY,
    appointment_id VARCHAR(20) NOT NULL,
    patient_id INT FOREIGN KEY REFERENCES patients(id) NOT NULL,
    appointment_type VARCHAR(255) NOT NULL,
    doctor_id INT FOREIGN KEY REFERENCES staff(id) NOT NULL,
    comment_for_doctor VARCHAR(255),
    date DATE,
    time TIMESTAMP
);

CREATE TABLE vital_signs(
    ID INT PRIMARY KEY,
    patient_id VARCHAR(20)
    blood_pressure VARCHAR(20) NOT NULL,
    pulse_rate VARCHAR(20) NOT NULL,
    body_weight VARCHAR(20) NOT NULL,
    body_temperature VARCHAR(20) NOT NULL,
    urine_composition VARCHAR(255) NOT NULL,
    oxygen_saturation VARCHAR(255) NOT NULL
);

-- ALTER TABLE `appointment` ADD CONSTRAINT `foreign` FOREIGN KEY (`doctor_id`) REFERENCES `staff`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO staff(id, staff_id, full_name, gender, date_of_birth, email_address, staff_password, phone_no, position, unit, specialty)
    VALUES(null, '64a5691cec267', 'Jessica Gabriel', 'Female', '2002-03-27', 'jessica@medicare.com', '$2y$10$01IMTmJxf9k5zNVTveIsrOcfjGrU8Jq/lVLQu0VZTxL5pUjEMo4TS', '+234901292233701', 'Receptionist', 'opd', null)

-- ALTER TABLE `vital_signs`
--   ADD CONSTRAINT `vital_signs_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);
-- COMMIT;