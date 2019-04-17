
/*======================= CompuStore Main Database ===================================================*/

create database CompuStore;
use CompuStore;

/* CustomerAccount(acc_id, email, password,  fname, lname, gender, date_of_birth, street, city, parish, telephone, created_on) */
create table CustomerAccount(
	acc_id int auto_increment not null,
	fname varchar(30) not null,
	lname varchar(30) not null,
	telephone varchar(10),
	date_of_birth Date not null,
	email varchar(100),
	password varchar(255) not null,
	created_on Date not null,
	primary key(acc_id) 
);

/* CreditCardDetails(card_num, expiration_month, expiration_year, billing_street, billing_city, billing_parish) */
create table CreditCardDetails(
	card_num int not null,
	expiration_month tinyint(2) not null,
	expiration_year smallint(4) not null,
	primary key(card_num) 
);

/*CustomerCreditCard(acc_id, card_num)*/
create table CustomerCreditCard(
	acc_id int not null,
	card_num int not null,
	primary key(acc_id, card_num),
	foreign key(acc_id) references CustomerAccount(acc_id) on DELETE cascade on UPDATE cascade,
	foreign key(card_num) references CreditCardDetails(card_num) on DELETE cascade on UPDATE cascade
);

/* Branch(br_id, name, street, city, parish, telephone) */
create table Branch(
	br_id int not null,
	name varchar(100) not null, 
	primary key(br_id)
);

/* Laptop(model_id, brand, description, thumbnail, price) */
create table Laptop(
	model_id varchar(100) not null,
	description text,
	model text not null,
	price double(10,2) not null,
	brand varchar(100) not null,
	primary key(model_id) 
);
create table Carttotal(
	acc_id int not null,
	count_qty int not null,
	total double(20,2) not null,
	primary key(acc_id),
	foreign key(acc_id) references CustomerAccount(acc_id) on DELETE cascade on UPDATE cascade
);
/* CartItems(acc_id, model_id, br_id, quantity, cost, date_added) */
create table CartItems(
	acc_id int not null,
	model_id varchar(100) not null,
	br_id int not null,
	quantity int not null,
	cost double(10,2) not null,
	date_added date not null,
	primary key(acc_id, model_id),
	foreign key(acc_id) references Carttotal(acc_id) on DELETE cascade on UPDATE cascade,
	foreign key(model_id) references Laptop(model_id) on DELETE cascade on UPDATE cascade,
	foreign key(br_id) references Branch(br_id) on DELETE cascade on UPDATE cascade
);

/* Warehouse(wh_id, street, city, parish, telephone) */
create table Warehouse(
	wh_id int auto_increment not null,
	street varchar(100) not null,
	city varchar(100) not null,
	parish varchar(100) not null,
	telephone varchar(10) not null,
	primary key(wh_id)
);

/* Stores(wh_id, model_id, quantity) */
create table Stores(
	wh_id int not null,
	model_id varchar(100) not null,
	quantity int not null,
	primary key(wh_id, model_id),
	foreign key(wh_id) references Warehouse(wh_id) on DELETE cascade on UPDATE cascade,
	foreign key(model_id) references Laptop(model_id) on DELETE cascade on UPDATE cascade
);

/* Receipt(track_num, invoice) */
create table Receipt(
	track_num int not null,
	primary key(track_num)
);

/* Checkout(acc_id, track_num, total_cost, transaction_date) */
create table Checkout(
	acc_id int not null,
	track_num int not null,
	total_cost double(20,2) not null,
	transaction_date date not null,
	primary key(acc_id, track_num),
	foreign key(acc_id) references Carttotal(acc_id) on DELETE cascade on UPDATE cascade,
	foreign key(track_num) references Receipt(track_num) on DELETE cascade on UPDATE cascade
);

/* PurchasedItems(pur_id, acc_id, serial_num, br_id, cost, date_purchased) */
create table PurchasedItems(
	pur_id int auto_increment not null,
	acc_id int not null,
	model_id varchar(100) not null,
	br_id int not null,
	cost double(20,2) not null,
	date_purchased date not null,
	primary key(pur_id),
	foreign key(acc_id) references Carttotal(acc_id) on DELETE cascade on UPDATE cascade,
	foreign key(model_id) references Laptop(model_id) on DELETE cascade on UPDATE cascade,
	foreign key(br_id) references Branch(br_id) on DELETE cascade on UPDATE cascade
);

/* WriteReview(acc_id, model_id, rev_text, date_written) */
create table WriteReview(
	acc_id int not null,
	model_id varchar(100) not null,
	rev_text text not null,
	date_written date not null,
	primary key(acc_id, model_id),
	foreign key(acc_id) references CustomerAccount(acc_id) on DELETE cascade on UPDATE cascade,
	foreign key(model_id) references Laptop(model_id) on DELETE cascade on UPDATE cascade
);


INSERT INTO CustomerAccount VALUES('321', 'Philip', 'Becker', '8827297','','michellerobbins@daniel.com','pass123','');
INSERT INTO CustomerAccount VALUES('343', 'Jacob', 'Webster', '9666851','','abrown@hamilton-paul.com','pass456','');
INSERT INTO CustomerAccount VALUES('302', 'Linda', 'Blanchard', '9925303','','erussell@wilson.com','pass789','');
INSERT INTO CustomerAccount VALUES('442', 'Jessica', 'Le', '9887559','','john53@thomas-ramirez.info','pass012','');
INSERT INTO CustomerAccount VALUES('265', 'Blake', 'Adams', '8921463','','anthony08@hotmail.com','pass345','');
INSERT INTO CustomerAccount VALUES('642', 'John', 'Lopez', '9167091','','paigeray@gmail.com','pass678','');
INSERT INTO CustomerAccount VALUES('540', 'Jordan', 'Morrison', '8992039','','jnoble@garcia.biz','pass901','');
INSERT INTO CustomerAccount VALUES('345', 'Lisa', 'Colon', '9775869','','jennifer96@fuller.biz','pass234','');
INSERT INTO CustomerAccount VALUES('233', 'Linda', 'Harris', '9391470','','joshua48@gmail.com','pass567','');
INSERT INTO CustomerAccount VALUES('756', 'Edward', 'Anderson', '8965631','','fshaw@hotmail.com','pass890','');


INSERT INTO Laptop VALUES('3721','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','969', '646324.00','MSI');

INSERT INTO Laptop VALUES('4160','Product Dimensions: 5.4 x 0.3 x 2.8 inches, Item Weight: 4.6 ounces , Battery type: Lithium ion','860', '141739.00','LENOVA');

INSERT INTO Laptop VALUES('4406','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','212', '396234.00','LENOVA');

INSERT INTO Laptop VALUES('3629','Product Dimensions: 5.4 x 0.3 x 2.8 inches, Item Weight: 4.6 ounces , Battery type: Lithium ion','796', '532031.00','LENOVA');

INSERT INTO Laptop VALUES('2813','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','211', '285739.00','HP');

INSERT INTO Laptop VALUES('8764','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','691', '548045.00','LENOVA');

INSERT INTO Laptop VALUES('8033','Product Dimensions: 5.4 x 0.3 x 2.8 inches, Item Weight: 4.6 ounces , Battery type: Lithium ion','988', '181802.00','LENOVA');

INSERT INTO Laptop VALUES('7423','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','114', '271380.00','TOSHIBA');

INSERT INTO Laptop VALUES('5400','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','738', '554452.00','ACER');

INSERT INTO Laptop VALUES('2187','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','267', '117348.00','MSI');

INSERT INTO Laptop VALUES('9014','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','592', '230167.00','MSI');

/*---------------------*/

INSERT INTO CreditCardDetails VALUES('31', '12', '2021');
INSERT INTO CreditCardDetails VALUES('33', '09', '2020');
INSERT INTO CreditCardDetails VALUES('32', '05', '2019');

INSERT INTO CustomerCreditCard VALUES('321', '31');
INSERT INTO CustomerCreditCard VALUES('343', '33');
INSERT INTO CustomerCreditCard VALUES('302', '32');

INSERT INTO Branch VALUES('01', 'branch1');
INSERT INTO Branch VALUES('03', 'branch2');
INSERT INTO Branch VALUES('02', 'branch3');

INSERT INTO Warehouse VALUES('011', '17 seaview Ave', 'kingston', 'kingston','6439102');


INSERT INTO Stores VALUES('011','3721','54');

INSERT INTO Stores VALUES('011','4160','76');

INSERT INTO Stores VALUES('011','4406','20');

INSERT INTO Stores VALUES('011','3629','90');

INSERT INTO Stores VALUES('011','2813','0');

INSERT INTO Stores VALUES('011','8764','54');

INSERT INTO Stores VALUES('011','8033','100');

INSERT INTO Stores VALUES('011','7423','76');

INSERT INTO Stores VALUES('011','5400','29');

INSERT INTO Stores VALUES('011','2187','0');

INSERT INTO Stores VALUES('011','9014','15');
/*---------------------------PROCEDURE-------------------------------------------------------------------------------------------------------------*/
/*PROCEDURE for getcost(argument varchar)*/ 

DELIMITER //
	CREATE PROCEDURE getcost(IN acc_id int,IN model_id int,IN br_id int,IN quantity int,IN cost double(20,2))
	BEGIN
	INSERT INTO CartItems VALUES (acc_id, model_id, br_id, quantity ,quantity*cost, CURDATE());
	END //
DELIMITER ;


DELIMITER //
	CREATE PROCEDURE createACC(IN fname varchar(30),IN lname varchar(30),IN telephone varchar(10),IN date_of_birth Date,IN email varchar(100),IN password varchar(255))
	BEGIN
	INSERT INTO CustomerAccount(fname,lname,telephone,date_of_birth,email,password,created_on) VALUES (fname ,lname ,telephone ,date_of_birth ,email ,password ,CURDATE());
	END //
DELIMITER ;

/*PROCEDURE for addPurchasedItem(argument int, argument int, argument varchar, argument double )*/ 
DELIMITER //
	CREATE PROCEDURE addPurchasedItem(IN acc_id int, IN product_id int, IN br_id  int, IN cost double(20,2))
	BEGIN
	INSERT INTO PurchasedItems VALUES (acc_id, product_id, br_id, old.cost, CURDATE());
	END //
DELIMITER ;

/*------------------------TRIGGER----------------------------------------------------------------------------------------------------------------------------*/

/* TRIGGER  newCartItems*/
DELIMITER $$
	CREATE TRIGGER newItem
	AFTER INSERT ON CartItems
	FOR EACH ROW
	BEGIN
	UPDATE Carttotal SET count_qty = count_qty + new.quantity, total = total + new.cost WHERE acc_id = new.acc_id;
	END $$
DELIMITER ;

/* TRIGGER  UPDATECartItems*/
DELIMITER $$
	CREATE TRIGGER updateItem
	AFTER UPDATE ON CartItems
	FOR EACH ROW
	BEGIN
	UPDATE  Carttotal SET count_qty = ((count_qty - old.quantity) + new.quantity), total = ((total - old.cost) + new.cost) WHERE acc_id = new.acc_id;
	END $$
DELIMITER ;

/* TRIGGER  DelectCartItems*/
DELIMITER $$
	CREATE TRIGGER deleteItem
	AFTER DELETE ON CartItems
	FOR EACH ROW
	BEGIN
	UPDATE Carttotal SET count_qty = (count_qty - old.quantity), total = (total - old.cost) WHERE acc_id = old.acc_id;
	END $$
DELIMITER ;


/*======================= Branch1 Database ===================================================*/

create database Branch1;
use Branch1;

/* Laptop(model_id, model, brand, description, thumbnail) */
create table Laptop(
	model_id varchar(100) not null,
 	description text,
	model text not null,
	brand varchar(100) not null,
	primary key(model_id) 
);

/* AmountInStock(model_id, quantity) */
create table AmountInStock(
	model_id varchar(100)not null ,
	quantity int not null,
	primary key(model_id),
	foreign key(model_id) references Laptop(model_id) on DELETE cascade on UPDATE cascade
);

	
INSERT INTO Laptop VALUES('3721','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','969','MSI');

INSERT INTO Laptop VALUES('4160','Product Dimensions: 5.4 x 0.3 x 2.8 inches, Item Weight: 4.6 ounces , Battery type: Lithium ion','860', 'LENOVA');

INSERT INTO Laptop VALUES('5400','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','738','ACER');

INSERT INTO Laptop VALUES('2187','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','267','MSI');

INSERT INTO Laptop VALUES('9014','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','592','MSI');

INSERT INTO Laptop VALUES('8033','Product Dimensions: 5.4 x 0.3 x 2.8 inches, Item Weight: 4.6 ounces , Battery type: Lithium ion','988','LENOVA');


INSERT INTO AmountInStock VALUES('3721','34');

INSERT INTO AmountInStock VALUES('4160','28');

INSERT INTO AmountInStock VALUES('5400','33');

INSERT INTO AmountInStock VALUES('2187','12');

INSERT INTO AmountInStock VALUES('9014','0');

INSERT INTO AmountInStock VALUES('8033','65');

/*------PROCEDURE-------------------------------------------------------------------------------------------------------*/

/*PROCEDURE for purchaseItemr(argument varchar)*/  
DELIMITER //
	CREATE PROCEDURE purchaseItem(IN modelId varchar(100), amt int)
	BEGIN
	UPDATE AmountInStock SET quantity = (quantity - amt) WHERE model_id = modelId;
	END //
DELIMITER ;


/*======================= Branch2 Database ===================================================*/

create database Branch2;
use Branch2;

/* Laptop(model_id, model, brand, description, thumbnail) */
create table Laptop(
	model_id varchar(100) not null,
 	description text,
	model text not null,
	brand varchar(100) not null,
	primary key(model_id) 
);

/* AmountInStock(model_id, quantity) */
create table AmountInStock(
	model_id varchar(100) not null,
	quantity int not null,
	primary key(model_id),
	foreign key(model_id) references Laptop(model_id) on DELETE cascade on UPDATE cascade
);


INSERT INTO Laptop VALUES('3721','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','969','MSI');

INSERT INTO Laptop VALUES('4160','Product Dimensions: 5.4 x 0.3 x 2.8 inches, Item Weight: 4.6 ounces , Battery type: Lithium ion','860', 'LENOVA');

INSERT INTO Laptop VALUES('4406','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','212', 'LENOVA');

INSERT INTO Laptop VALUES('2187','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','267', 'MSI');

INSERT INTO Laptop VALUES('9014','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','592', 'MSI');

INSERT INTO Laptop VALUES('2813','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','211', 'HP');



INSERT INTO AmountInStock VALUES('3721','20');

INSERT INTO AmountInStock VALUES('4160','48');

INSERT INTO AmountInStock VALUES('4406','4');

INSERT INTO AmountInStock VALUES('2187','6');

INSERT INTO AmountInStock VALUES('9014','52');

INSERT INTO AmountInStock VALUES('2813','8');
/*------PROCEDURE-------------------------------------------------------------------------------------------------------*/

/*PROCEDURE for purchaseItemr(argument varchar)*/ 
DELIMITER //
	CREATE PROCEDURE purchaseItem(IN modelId varchar(100), amt int)
	BEGIN
	UPDATE AmountInStock SET quantity = (quantity - amt) WHERE model_id = modelId;
	END //
DELIMITER ;

/*======================= Branch3 Database ===================================================*/

create database Branch3;
use Branch3;

/* Laptop(model_id, model, brand, description, thumbnail) */
create table Laptop(
	model_id varchar(100) not null,
 	description text,
	model text not null,
	brand varchar(100) not null,
	primary key(model_id) 
);

/* AmountInStock(model_id, quantity) */
create table AmountInStock(
	model_id varchar(100) not null,
	quantity int not null,
	primary key(model_id),
	foreign key(model_id) references Laptop(model_id) on DELETE cascade on UPDATE cascade
);


INSERT INTO Laptop VALUES('4406','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','212', 'LENOVA');

INSERT INTO Laptop VALUES('3629','Product Dimensions: 5.4 x 0.3 x 2.8 inches, Item Weight: 4.6 ounces , Battery type: Lithium ion','796', 'LENOVA');

INSERT INTO Laptop VALUES('2813','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','211', 'HP');

INSERT INTO Laptop VALUES('8764','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','691', 'LENOVA');

INSERT INTO Laptop VALUES('8033','Product Dimensions: 5.4 x 0.3 x 2.8 inches, Item Weight: 4.6 ounces , Battery type: Lithium ion','988', 'LENOVA');

INSERT INTO Laptop VALUES('7423','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','114', 'TOSHIBA');

INSERT INTO Laptop VALUES('5400','Product Dimensions: 7.3 x 4.2 x 4.3 inches, Item Weight: 8.6 ounces, Battery type: Lithium ion','738', 'ACER');



INSERT INTO AmountInStock VALUES('4406','20');

INSERT INTO AmountInStock VALUES('3629','45');

INSERT INTO AmountInStock VALUES('2813','11');

INSERT INTO AmountInStock VALUES('8764','44');

INSERT INTO AmountInStock VALUES('8033','55');

INSERT INTO AmountInStock VALUES('7423','21');

INSERT INTO AmountInStock VALUES('5400','51');


/*------PROCEDURE-------------------------------------------------------------------------------------------------------*/


DELIMITER //
	CREATE PROCEDURE purchaseItem(IN modelId varchar(100), amt int)
	BEGIN
	UPDATE AmountInStock SET quantity = (quantity - amt) WHERE model_id = modelId;
	END //
DELIMITER ;

use CompuStore;