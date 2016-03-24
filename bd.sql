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

drop procedure inuser;
	delimiter //
	create procedure inuser(
		email varchar(255),
		password varchar(255),
		firstname varchar(255),
		lastname varchar(255))
	begin
		insert into user values(null,email,password,firstname,lastname);
	end //
	delimiter ;
call inuser('test@test.fr','1234','test','samm');
call inuser('you@test.fr','1234','test','samm');
call inuser('mar@test.fr','1234','test','samm');
call inuser('hec@test.fr','1234','test','samm');
call inuser('dyl@test.fr','1234','test','samm');
call inuser('hey@test.fr','1234','test','samm');
call inuser('lin@test.fr','1234','test','samm');
call inuser('youu@test.fr','1234','test','samm');
call inuser('hola@test.fr','1234','test','samm');
call inuser('yolo@test.fr','1234','test','samm');
call inuser('hector@test.fr','1234','test','samm');
call inuser('marvyn@test.fr','1234','test','samm');
call inuser('linda@test.fr','1234','test','samm');
call inuser('nada@test.fr','1234','test','samm');



drop procedure inexp;
	delimiter //
	create procedure inexp(
		id_user int,
		address text, 
		phone varchar(30))
	begin
		insert into expert values(null,id_user,address,phone);
	end //
	delimiter ;

call inexp(1,'aix en provence','0785362596');
call inexp(2,'aix en provence','0785362596');
call inexp(3,'aix en provence','0785362596');
call inexp(4,'aix en provence','0785362596');
call inexp(5,'aix en provence','0785362596');
call inexp(6,'aix en provence','0785362596');
call inexp(7,'aix en provence','0785362596');
call inexp(8,'aix en provence','0785362596');
call inexp(9,'aix en provence','0785362596');
call inexp(10,'aix en provence','0785362596');
call inexp(11,'aix en provence','0785362596');
call inexp(12,'aix en provence','0785362596');
call inexp(13,'aix en provence','0785362596');
call inexp(14,'aix en provence','0785362596');


	drop procedure inform;
	delimiter //
	create procedure inform(
		id_expert int,		
		title varchar(255),
  		description text,
  		image varchar(255),
  		required_skill text,
  		difficulty varchar(10),
		keywords text 
		)
	begin
		insert into formation values(null,id_expert,title,
		description,image,required_skill,difficulty,keywords);
	end //
	delimiter ;

call inform(1,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(2,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(3,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(4,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(5,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(6,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(7,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(1,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(2,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(3,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(4,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(5,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(6,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(7,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(8,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(9,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(10,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(11,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(12,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(13,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(14,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(1,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(2,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(3,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(4,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(5,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(6,'any title','a simple description','img/avatar.png','any skill','normal','words');
call inform(7,'any title','a simple description','img/avatar.png','any skill','normal','words');


	drop procedure ininsc;
	delimiter //
	create procedure ininsc(
		id_formation int, 
  		id_user int, 
  		date_inscription datetime
		)
	begin
		insert into inscription values(null,id_formation,id_user,
		date_inscription);
	end //
	delimiter ;
call ininsc(1,1,'2016-03-16');
call ininsc(2,2,'2016-03-15');
call ininsc(3,3,'2016-03-14');
call ininsc(4,4,'2016-03-13');
call ininsc(5,5,'2016-03-12');
call ininsc(6,6,'2016-03-11');
call ininsc(7,7,'2016-03-10');
call ininsc(8,1,'2016-03-16');
call ininsc(9,2,'2016-03-15');
call ininsc(10,3,'2016-03-14');
call ininsc(11,4,'2016-03-13');
call ininsc(12,5,'2016-03-12');
call ininsc(13,6,'2016-03-11');
call ininsc(14,7,'2016-03-10');

drop procedure inchap;
	delimiter //
	create procedure inchap(
		id_formation int,
  		title varchar(255),
  		description text
		)
	begin
		insert into chapter values(null,id_formation,title,
		description);
	end //
	delimiter ;

call inchap(1,'simple title','simple description');
call inchap(2,'simple title','simple description');
call inchap(3,'simple title','simple description');
call inchap(4,'simple title','simple description');
call inchap(5,'simple title','simple description');
call inchap(6,'simple title','simple description');
call inchap(7,'simple title','simple description');
call inchap(8,'simple title','simple description');
call inchap(9,'simple title','simple description');
call inchap(10,'simple title','simple description');
call inchap(11,'simple title','simple description');
call inchap(12,'simple title','simple description');
call inchap(13,'simple title','simple description');
call inchap(14,'simple title','simple description');
call inchap(15,'simple title','simple description');
call inchap(16,'simple title','simple description');
call inchap(17,'simple title','simple description');
call inchap(18,'simple title','simple description');
call inchap(19,'simple title','simple description');
call inchap(20,'simple title','simple description');
call inchap(21,'simple title','simple description');

drop procedure inclas;
	delimiter //
	create procedure inclas(
		id_chapter int,
  		title varchar(255),
  		description text,
  		video varchar(255),
  		docs varchar(255)
		)
	begin
		insert into class values(null,id_chapter,title,
		description, video, docs);
	end //
	delimiter ;

call inclas(1,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(2,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(3,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(4,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(5,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(6,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(7,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(8,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(9,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(10,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(11,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(12,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(13,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');
call inclas(14,'simple title','simple description','https://www.youtube.com/embed/oavMtUWDBTM','Cahier_des_charges_FaceMOOC.pdf');


drop procedure incom;
	delimiter //
	create procedure incom(
		id_formation int,
  		id_user int,
  		mark int,
  		description text,
  		date_comment datetime
		)
	begin
		insert into comment values(null,id_formation,id_user,
		mark, description, date_comment);
	end //
	delimiter ;
call incom(1,1,100,'good','2016-03-16');
call incom(2,2,100,'good','2016-03-16');
call incom(3,3,100,'good','2016-03-16');
call incom(4,4,100,'good','2016-03-16');
call incom(5,5,100,'good','2016-03-16');
call incom(6,6,100,'good','2016-03-16');
call incom(7,7,100,'good','2016-03-16');



select * from user;
select * from expert;
select * from formation;
select * from inscription;
select * from chapter;
select * from class;
select * from comment;



