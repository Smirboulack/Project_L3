SELECT * from utilisateurs u;
drop table utilisateurs; 
delete from utilisateurs;

create table utilisateurs(
id_u INTEGER(5) NOT NULL AUTO_INCREMENT,
pseudo_u VARCHAR(30),
mot_de_passe VARCHAR(30),
email VARCHAR(50),
date_naiss date,
primary key (id_u,pseudo_u,email)
);
alter table utilisateurs add unique (email);
ALTER table utilisateurs modify id_u INT NOT NULL AUTO_INCREMENT;

create table utilisateurs2(
id_u INTEGER(5) NOT NULL AUTO_INCREMENT,
pseudo_u VARCHAR(30),
mot_de_passe VARCHAR(30),
email VARCHAR(50),
date_naiss date,
user_profile VARCHAR(100),
user_status enum('Disabled','Enable'),
user_date_created date,
user_verification_code VARCHAR(100),
user_login_status enum('Logout','Login'),
user_score INTEGER(10),
primary key (id_u,pseudo_u,email)
);
alter table utilisateurs2 add unique (email);
ALTER table utilisateurs2 modify id_u INT NOT NULL AUTO_INCREMENT;

CREATE TABLE `utilisateurs3` (
id_u INTEGER(5) NOT NULL,
pseudo_u VARCHAR(30),
mot_de_passe VARCHAR(50),
email VARCHAR(50),
date_naiss date,
img varchar(255) NOT NULL,
status varchar(255) NOT NULL,
score INTEGER(5),
primary key (id_u,pseudo_u,email)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
drop table utilisateurs3 ;
SELECT * from utilisateurs3;
alter table utilisateurs3 add unique (email);
ALTER table utilisateurs3 modify id_u INT NOT NULL AUTO_INCREMENT;


CREATE TABLE messages (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);
 
 ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

SELECT * from users u ;
SELECT * from messages m ;

