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