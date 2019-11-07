create database sysgantt;
use sysgantt;

create table dia(
	id int not null auto_increment primary key,
	name varchar(50),
	description varchar(50),
	duration int default 1,
	/*
	start_at date,
	finish_at date,
	*/
	status int default 1,
	created_at datetime
);

create table item(
	id int not null auto_increment primary key,
	title varchar(50),
	description varchar(50),
	color varchar(255),
	status int default 1,
	start int default 1,
	finish int default 1,
	created_at datetime,
	dia_id int not null,
	foreign key (dia_id) references dia(id)
);

