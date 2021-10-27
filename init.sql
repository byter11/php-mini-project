CREATE DATABASE `lab-06`;

USE 'lab-06';

CREATE TABLE CUSTOMERS ( 
	cust_ID int PRIMARY KEY AUTO_INCREMENT, 
	fname varchar(20) NOT NULL, 
	lname varchar(20) NOT NULL, 
	gender varchar(20), 
	age int, 
	contact_add varchar(20), 
	cust_email varchar(50), 
	cust_pass varchar(20) 
);

INSERT INTO CUSTOMERS VALUES (
	100,
	'Steven',
	'King',
	'Male',
	'32',
	'',
	'steven.king@lab-06.com',
	'stking'
);

CREATE TABLE TICKET ( 
	ticket_ID int PRIMARY KEY AUTO_INCREMENT, 
	ticket_number int NOT NULL, 
	accom_time time NOT NULL, 
	ticket_type varchar(10), 
	prize int, 
	seat_number int 
);

ALTER TABLE TICKET 
ADD cust_ID int, 
ADD CONSTRAINT FOREIGN KEY (cust_ID) REFERENCES CUSTOMERS (cust_ID);

CREATE TABLE ADMINS (
	admin_ID int PRIMARY KEY, 
	fname varchar(20) NOT NULL, 
	lname varchar(20) NOT NULL, 
	gender varchar(5), 
	age int, 
	contact_add varchar(20), 
	admin_email varchar(50), 
	admin_pass varchar(20) 
);

INSERT INTO ADMINS values (0, 'Mohsin', 'Shaikh', 'Male', 21, '', 'k191308', 'k191308');