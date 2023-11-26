
/*Populating User_Info Table*/
INSERT INTO User_Info (Email, Phone_Num) VALUES 
                      ('Brad@gmail.com', '7781563261'),
					  ('Ross@gmail.com', '6478859462'),
					  ('Reema@gmail.com', '6045521665'),
					  ('appleinc@gmail.com', '7789859856'),
					  ('Ryan@gmail.com', '7784652222'),
					  ('samsungelec@gmail.com', '7784651111'),
					  ('Kyle@gmail.com', '6044652222'),
					  ('asustek@gmail.com', '6044651113'),
					  ('hpcom@gmail.com', '2044651666'),
					  ('lenovogrp@gmail.com', '7784562911'),
					  ('Jane@gmail.com', '7784659292');

/*Populating Login_Has Table*/
INSERT INTO Login_Has(Username, User_Password, Email) VALUES 
            ('BradEvans', 'Brad123', 'Brad@gmail.com'),
			('RossDavid', 'Ross456', 'Ross@gmail.com'),
			('ReemaSmith', 'Reema789', 'Reema@gmail.com'),
			('Appleinc', 'Apple123', 'appleinc@gmail.com'),
			('RyanRogers', 'Ryan101', 'Ryan@gmail.com'),
			('SamsungElec', 'Samsungelec456', 'samsungelec@gmail.com'),
			('KyleKeith', 'Kyle123', 'Kyle@gmail.com'),
			('AsusTek', 'Asustek789', 'asustek@gmail.com'),
			('HPCom', 'HPCom101', 'hpcom@gmail.com'),
			('Lenovogrp', 'lenovogrp102', 'lenovogrp@gmail.com'),
			('JaneDSimon', 'Jane102', 'Jane@gmail.com');

/*Populating Login_Has Table*/
INSERT INTO Product_Company(Email, Brand_Name) VALUES 
            ('appleinc@gmail.com', 'Apple'),
			('samsungelec@gmail.com', 'Samsung'),
			('asustek@gmail.com', 'Asus'),
			('hpcom@gmail.com', 'HP'),
			('lenovogrp@gmail.com', 'Lenovo');

/*Populating Product_Model_Info Table*/
INSERT INTO Product_Model_Info(Model_Name, Manufacturer_Email ,Product_Type, Brand_Name, Link, Price, GPU, CPU, Operating_System, Screen_Size, Storage_Size, Battery_Life) VALUES 
                ('Apple iPhone 15 Pro Max', 'appleinc@gmail.com','Phone', 'Apple', 'https://www.apple.com/ca/shop/buy-iphone/iphone-15-pro  ', '1800', '6-core unit', 'Apple A17 Pro', 'iOS 17', '6.7 inches', '512GB', '20hrs 15mins'),
       			('Samsung Galaxy S23 Ultra','samsungelec@gmail.com' ,'Phone', 'Samsung', 'https://www.samsung.com/ca/smartphones/galaxy-s23-ultra/ ', '1700', 'Adreno 740', 'Qualcomm Snapdragon 8 Gen 2', 'Android 13', '6.8 inches', '512GB', '13hrs'),
       			('Asus VivoBook 15 F512FA','asustek@gmail.com' ,'Laptop', 'Asus', 'https://www.asus.com/ca-en/laptops/for-home/all-series/vivobook-15-f512-amd/  ', '1000', '‎Intel UHD Graphics 620', 'Intel i3-1005G1', 'Windows 10', '15.6 inches', '256GB', '7hrs'),
       			('Apple 2020 MacBook Air', 'appleinc@gmail.com','Laptop', 'Apple', 'https://www.apple.com/ca/macbook-air/  ', '1300', '8-core', 'Apple M1', 'MacOS', '13.3 inches', '256GB', '11hrs'),
       			('HP Chromebase All-in-One 22','hpcom@gmail.com' ,'Home Desktop', 'HP', 'https://www.hp.com/us-en/shop/pdp/hp-chromebase-all-in-one-22-aa0050t-2z1z3av-1  ', '500', 'Intel UHD Graphics', 'Intel Pentium Gold 6405U', 'Google Chrome OS', '21.5 inches', '512G', '19hrs'),
      			('Lenovo IdeaCentre AIO 3i', 'lenovogrp@gmail.com','Home Desktop', 'Lenovo', 'https://www.lenovo.com/ca/en/p/desktops/ideacentre/aio-300-series/ideacentre-aio-3i-(27)-/fficf300347?orgRef=https%253A%252F%252Fwww.google.com%252F  ', '600', 'Intel UHD Graphics 610', 'Intel Pentium Gold G6400T', 'Windows 11', '21.5 inches', '1TB', '20hrs'),
       			('Apple iPad Air', 'appleinc@gmail.com' ,'Tablet', 'Apple', 'https://www.apple.com/ca/ipad-air/?afid=p238%7CshmKOKanW-dc_mtid_1870765e38482_pcrid_624872989417_pgrid_116427579489_pntwk_g_pchan__pexid__&cid=aos-ca-kwGO-ipad--slid---product-  ', '1100', '8-core', 'Apple M1', 'iPadOS 15', '10.9 inches', '64GB', '5hrs 11mins');

/*Populating Employee Table */
INSERT INTO Employee (Email, Name) VALUES 
                ('appleinc@gmail.com', 'Mike'),
                ('samsungelec@gmail.com', 'Anna'),
                ('asustek@gmail.com', 'David'),
                ('hpcom@gmail.com', 'Sally'),
                ('lenovogrp@gmail.com', 'Janis');
               





