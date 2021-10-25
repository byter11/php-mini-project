CREATE TABLE CUSTOMERS ( 
	cust_ID int PRIMARY KEY, 
	fname varchar(20) NOT NULL, 
	lname varchar(20) NOT NULL, 
	gender varchar(5), 
	age int, 
	contact_add varchar(20), 
	cust_email varchar(20), 
	cust_pass varchar(20) 
);


CREATE TABLE TICKET ( 
	ticket_ID int PRIMARY KEY, 
	ticket_number int NOT NULL, 
	accom_time datetime NOT NULL, 
	ticket_type varchar(10), 
	prize int, 
	seat_number int 
);

ALTER TABLE TICKET 
ADD cust_ID int, 
ADD CONSTRAINT FOREIGN KEY (cust_ID) REFERENCES CUSTOMERS (cust_ID);