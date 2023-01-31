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