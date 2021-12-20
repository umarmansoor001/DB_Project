
CREATE TABLE Class
(
    class_ID INT(2) AUTO_INCREMENT,
    number INT(2),
    section VARCHAR(2),
    Primary KEY(class_ID,number),
    no_of_students INT(3)
);
CREATE TABLE Course
(
    Code VARCHAR(4) PRIMARY KEY,
    Name VARCHAR(15),
    class INT(2)
);
CREATE TABLE Parent
(
    P_ID INT(5) PRIMARY KEY AUTO_INCREMENT,
    F_Name VARCHAR(30),
    F_address VARCHAR(50),
    F_contactNo CHAR(11) UNIQUE,
    F_cnic CHAR(13) UNIQUE,
    F_email VARCHAR(20) UNIQUE,
    M_Name VARCHAR(30),
    M_address VARCHAR(50),
    M_contactNo CHAR(11) UNIQUE,
    M_cnic CHAR(13) UNIQUE,
    M_email VARCHAR(20) UNIQUE
);
CREATE TABLE Guardian
(
    G_ID INT(5) PRIMARY KEY AUTO_INCREMENT,
    G_Name VARCHAR(30),
    G_address VARCHAR(50),
    G_contactNo CHAR(11) UNIQUE,
    G_cnic CHAR(13) UNIQUE,
    G_gender VARCHAR(6),
    G_relationship VARCHAR(50)
);
CREATE TABLE Sign_up
(
    username VARCHAR(25) PRIMARY KEY,
    passcode VARCHAR(10),
    s_id INT(3),
    FOREIGN KEY (s_id) REFERENCES student(ID)
);
CREATE TABLE Staff
(
	ID INT(5) PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(15),
    lastName VARCHAR(15),
    address VARCHAR(50),
    contactNo INT(11) UNIQUE,
    cnic INT(13) UNIQUE,
    gender VARCHAR(6),
    email VARCHAR(20) UNIQUE,
    job_type VARCHAR(20),
    NGO_name VARCHAR(20),
    FOREIGN KEY (NGO_name) REFERENCES ngo(Name)
);
CREATE TABLE Student
(
	ID INT(5) PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(15),
    lastName VARCHAR(15),
    gender VARCHAR(6),
    dateofbirth date,
    Age INT(2),
    parents_id INT(3),
    FOREIGN KEY (parents_id) REFERENCES parent(P_ID),
    class_id INT(2),
    FOREIGN KEY (class_id) REFERENCES class(class_ID)
);
CREATE TABLE study
(
    student_id INT(5),
    course_code VARCHAR(5),
    PRIMARY KEY (student_id,course_code)
);
CREATE TABLE care
(
    child_id INT(5),
    FOREIGN KEY (child_id) REFERENCES student(ID),
    guardian_id INT(5),
    FOREIGN KEY (guardian_id) REFERENCES guardian(G_ID),
    PRIMARY KEY (child_id,guardian_id)
);
CREATE TABLE Account
(
   challanNo INT(8) PRIMARY KEY AUTO_INCREMENT,
    Amount INT(6),
    Discount INT(3),
    Discounted_amount INT(6),
    paid tinyint(1),
    Due_date date,
    issue_date date,
    paid_date date,
    s_id INT(5),
    FOREIGN KEY (s_id) REFERENCES student(ID)
);
ALTER TABLE account AUTO_INCREMENT = 32000;
INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Umar','Butt','F6 Islamabad','03331234567','342011921234','umar001@gmail.com','President','Male');
INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender) 
VALUES ('Ali','Butt','F8/4 Islamabad','03331234578','34201195566','ali001@gmail.com','President','Male');

INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Laiba','komal','Bahria Town Islambad','03331234589','342011933333','laiba033@gmail.com','Vice President','Female');
INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Subhan','khan','Johar Town Islambad','03331234769','342011946743','subhan007@gmail.com','Principal','Male');
INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Saad','Sagheer','Johar Town Taxila','03320507701','85674656780','saad007@gmail.com','Principal','Male');

INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Hammad','Sagheer','Johar Town Taxila','03320517704','85674614322','hammad007@gmail.com','Principal','Male');
INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Sarah','Rehman','Choarngi Wah','03320527705','95674614455','sarah007@gmail.com','cleric','Female');
INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Kamran','Afzal','Sialkot','03325527710','98674611224','kami007@gmail.com','teacher','Male');
INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Haider','Bukhari','Dha','02325527750','08674611234','haider007@gmail.com','teacher','Male');
INSERT INTO staff(firstName,lastName,address,contactNo,cnic,email,job_type,gender)
VALUES ('Abdullah','Saeed','PMO','00325527720','88674611234','ab007@gmail.com','teacher','Male');


Insert into parent(F_name,F_address,F_contactNo,F_cnic,F_email,M_name,M_address,M_contactNo,M_cnic,M_email)
Values('Wasim','Lahore','012345','12345','wasim@gmail.com','Rubina','Lahore','012346','123456','rubina@gmail.com');
Insert into parent(F_name,F_address,F_contactNo,F_cnic,F_email,M_name,M_address,M_contactNo,M_cnic,M_email)
Values('Ashraf','Pindi','112345','22345','ash@gmail.com','Salma','Pindi','212346','323456','salma@gmail.com');
Insert into parent(F_name,F_address,F_contactNo,F_cnic,F_email,M_name,M_address,M_contactNo,M_cnic,M_email)
Values('Ashar','Pindi','812345','32345','ashr@gmail.com','Naghma','Pindi','412346','723456','ashr@gmail.com');
Insert into parent(F_name,F_address,F_contactNo,F_cnic,F_email,M_name,M_address,M_contactNo,M_cnic,M_email)
Values('Ali','Islamabad','822345','33345','ali@gmail.com','Sughra','Pindi','422346','793456','sugh@gmail.com');
Insert into parent(F_name,F_address,F_contactNo,F_cnic,F_email,M_name,M_address,M_contactNo,M_cnic,M_email)
Values('Asif','Islamabad','824345','33445','asif@gmail.com','Zehra','Islamabad','422846','793056','zehra@gmail.com');

