create database Bank;
use Bank;

create table CreditDetails(
	card_num varchar(15) not null,
	expiration_month tinyint(2) not null,
	expiration_year smallint(4) not null,
	PRIMARY KEY(card_num))
ENGINE=InnoDB;


INSERT INTO CreditDetails VALUES('31', '12', '2021');
INSERT INTO CreditDetails VALUES('33', '09', '2020');
INSERT INTO CreditDetails VALUES('32', '05', '2019');

INSERT INTO CreditDetails VALUES('481535171045','03','2022');
INSERT INTO CreditDetails VALUES('561959286372','04','2023');
INSERT INTO CreditDetails VALUES('254749198388','06','2023');