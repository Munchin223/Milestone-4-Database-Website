CREATE TABLE User_Info (
Email CHAR(40),
Phone_Num CHAR(10),
PRIMARY KEY (Email)
);

CREATE TABLE Login_Has (
Username CHAR(30),
User_Password CHAR(20),
Email CHAR(40),
PRIMARY KEY (Email, Username),
FOREIGN KEY (Email) REFERENCES User_Info(Email) ON DELETE CASCADE
);

CREATE TABLE Product_Company(
Email CHAR(40) NOT NULL,
Brand_Name CHAR(20) UNIQUE,
PRIMARY KEY (Email),
FOREIGN KEY (Email) REFERENCES User_info(Email) ON DELETE CASCADE
);

CREATE TABLE Product_Model_Info(
Model_Name CHAR(255),
Manufacturer_Email CHAR(40) NOT NULL,
Product_Type CHAR(255),
Brand_Name CHAR(255),
Link CHAR(255),
Price REAL,
GPU CHAR(255),
CPU CHAR(255),
Operating_System CHAR(255),
Screen_Size CHAR(255),
Storage_Size CHAR(255),
Battery_Life CHAR(255),
PRIMARY KEY (Model_name, Manufacturer_Email),
FOREIGN KEY (Manufacturer_Email) REFERENCES Product_Company(Email) ON DELETE CASCADE
);

CREATE TABLE Employee(
Email CHAR(40) NOT NULL,
Name CHAR(30),
PRIMARY KEY (Email,Name),
FOREIGN KEY (Email) REFERENCES User_info(Email) ON DELETE CASCADE
);