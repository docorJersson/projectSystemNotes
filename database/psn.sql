drop database if exists psn;
create database psn;
use psn;

create table users(
  id             bigint(20)   not null primary key auto_increment,
  name           varchar(255) not null,
  school         varchar(255) not null,
  password       varchar(255) not null,
  idrole         bigint(20)   null,
  remember_token varchar(100) null
);

create table roles(
  idrole bigint(20)   null primary key auto_increment,
  role   varchar(255) not null
);

ALTER TABLE users
	ADD (FOREIGN KEY (idrole) REFERENCES roles (idrole));

insert into roles(role) VALUES
('Administrador'),
('Docente Inicial'),
('Docente Primaria'),
('Docente Secundaria');

create procedure sprole()
SELECT * FROM roles where idrole >= 2 order by idrole;

insert into users (name,school,password,idrole,remember_token) VALUES
('luis','WWW','12345678','1','');