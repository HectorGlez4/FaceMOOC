-- just copy and paste
 --

drop database mooc;
create database mooc;
use mooc;

create table user(
		id_user int primary key auto_increment,
		email varchar(255),
		password varchar(255),
		firstname varchar(255),
		lastname varchar(255)
		)engine=innodb;
create table expert(
		id_expert int primary key auto_increment,
		id_user int, foreign key (id_user) references user(id_user) on delete cascade on update cascade,
		address text, 
		phone varchar(30) 
		)engine=innodb;

create table formation(
		id_formation int primary key auto_increment,
		id_expert int,
		foreign key (id_expert) references expert(id_expert) on delete cascade on update cascade,		
		title varchar(255),
  		description text,
  		image varchar(255),
  		required_skill text,
  		difficulty varchar(10),
		keywords text 
		)engine=innodb;

create table inscription(
		id_inscription int primary key auto_increment,
  		id_formation int, 
		foreign key (id_formation) references formation(id_formation) on delete cascade on update cascade,
  		id_user int, 
		foreign key (id_user) references user(id_user) on delete cascade on update cascade,
  		date_inscription datetime 
		)engine=innodb;

create table chapter(
		id_chapter int primary key auto_increment,
		id_formation int, foreign key (id_formation) references formation(id_formation) on delete cascade on update cascade,
  		title varchar(255),
  		description text 
		)engine=innodb;

create table class(
		id_class int primary key auto_increment,
		id_chapter int, foreign key (id_chapter) references chapter(id_chapter) on delete cascade on update cascade,
  		title varchar(255),
  		description text,
  		video varchar(255),
  		docs varchar(255)
		)engine=innodb;


create table comment(
		id_comment int primary key auto_increment,
		id_formation int, foreign key (id_formation) references formation(id_formation) on delete cascade on update cascade,
  		id_user int, foreign key (id_user) references user(id_user) on delete cascade on update cascade,
  		mark int,
  		description text,
  		date_comment datetime
		)engine=innodb;




select * from user;
select * from expert;
select * from formation;
select * from inscription;
select * from chapter;
select * from class;
select * from comment;
