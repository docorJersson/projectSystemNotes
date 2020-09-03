create database bdnotas_sistema;
use bdnotas_sistema;

create table usuario(
contraseña varchar(10) primary key,
usuario varchar(20),
colegio varchar(20)
);
insert into usuario
(usuario,contraseña,colegio)
values
("Noor","12345","ZOILA HORA DE ROBLES"),
("Rodolfo","56789","ZOILA HORA DE ROBLES"),
("Admin","123","ZOILA HORA DE ROBLES");
select*from usuario;
select usuario,contraseña from usuario where   usuario="Noor" and contraseña="12345";

create table periodo(
idperiodo int auto_increment primary key,
periodo varchar(6));
insert periodo (periodo) values ("2018"),("2019");
select * from periodo;

create table bimestre(
idbimestre int auto_increment primary key,
bimestre varchar(20),
idperiodo int);
alter table bimestre add constraint fk_bimestre_periodo foreign key(idperiodo)references periodo(idperiodo);
insert bimestre (bimestre,idperiodo) values 
("I Bimestre","1"),("II Bimestre","1"),("III Bimestre","1"),("IV Bimestre","1"),
("I Bimestre","2"),("II Bimestre","2"),("III Bimestre","2"),("IV Bimestre","1");
select b.bimestre,pd.periodo from bimestre b inner join periodo pd on pd.idperiodo=b.idperiodo;


create table personal(
idpersonal int auto_increment,
codigo varchar(4),
apellidonombre varchar(30),
dni varchar(8),
direccion varchar(30),
estado_civil varchar(14),
telefono varchar(10),
seguro_social varchar(15),
departamento varchar(30),
fecha date,
primary key(idpersonal,codigo)
);
insert into personal
(codigo,apellidonombre,dni,direccion,estado_civil,telefono,seguro_social,departamento,fecha)
values
("B074","Angelina Cubas","99","El Porvenir","Casado(a)","504135","EsSalud","Personal Docente Inicial","2017-03-15"),
("B075","Jesús Mejía","100","Avenida Gonzalez","Soltero(a)","317930","Minsa","Personal Docente Primaria","2016-04-15"),
("B076","Manuel Cardenas","101","Jr. Bolivar","Viudo(a)","145520","EsSalud","Personal Docente Secundaria","2015-04-15"),
("B077","Antonieta Chávez","102","Jr. Junin","Divorciado(a)","784520","Minsa","Personal Administrativo","2016-05-20");
select  distinct*from personal;
select distinct estado_civil from personal;
select distinct departamento from personal;
select p.codigo,p.apellidonombre,p.dni,p.direccion,p.estado_civil,p.telefono,p.seguro_social,p.departamento from personal p;
select p.codigo,p.apellidonombre,p.dni from personal p;
insert into personal(codigo,apellidonombre,dni,direccion,estado_civil,telefono,seguro_social,departamento) values ("B076","Doris Coronado","103","Avenida Ezequiel","Casado","445876","Minsa","Personal Docente Inicial");
select *from personal where estado_civil="Casado";
update personal set codigo="BO73", apellidonombre="Antonia Chavez", dni="100",direccion="Los Olivos",estado_civil="Soltero",telefono="447856",seguro_social="Minsa",departamento="Personal Docente Primaria" where codigo="B074";

create table nivel(
idnivel int auto_increment primary key,
descripcion_nivel varchar(20) 
);
insert into nivel values ("1","Inicial"),("2","Primaria"),("3","Secundaria"); 
select* from nivel; select descripcion_nivel from nivel;

create table grado(
idgrado int auto_increment primary key,
descripcion_grado varchar(45),
idnivel int
);
alter table grado add constraint fk_grado_nivel foreign key (idnivel) references nivel(idnivel);
insert into grado
(idnivel,descripcion_grado)
values
("1","3 Años"),("1","4 Años"),("1","5 Años"),("2","Primer Grado de Primaria"),("2","Segundo Grado de Primaria"),("2","Tercer Grado de Primaria"),
("2","Cuarto Grado de Primaria"),("2","Quinto Grado de Primaria"),("2","Sexto Grado de Primaria"),("3","Primer Grado de Secundaria"),("3","Segundo Grado de Secundaria"),
("3","Tercer Grado de Secundaria"),("3","Cuarto Grado de Secundaria"),("3","Quinto Grado de Secundaria");
select idgrado, descripcion_grado from grado;
select g.idgrado, n.descripcion_nivel, g.descripcion_grado from  grado g inner join nivel n 
on n.idnivel=g.idnivel;
select n.descripcion_nivel, g.descripcion_grado from  grado g inner join nivel n 
on n.idnivel=g.idnivel;
select n.descripcion_nivel, g.descripcion_grado from  grado g inner join nivel n 
on n.idnivel=g.idnivel where n.idnivel="1";


create table nivelgrado(
descripcion_nivel varchar(20),
descripcion_grado varchar(45),
primary key(descripcion_nivel,descripcion_grado)
);
alter table nivelgrado add constraint fk_nivelgrado_nivel foreign key (descripcion_nivel) references nivel(descripcion_nivel);



create table seccion(
idseccion int auto_increment primary key,
descripcion_seccion varchar(1),
idgrado int,
idnivel int
);
alter table seccion add constraint fk_seccion_grado foreign key (idgrado) references grado(idgrado);
alter table seccion add constraint fk_seccion_nivel foreign key (idnivel) references nivel(idnivel);
insert into seccion
(descripcion_seccion, idgrado,idnivel)
values
("U","1","1"),("U","2","1"),("U","3","1"),("A","4","2"),("B","4","2"),("C","4","2"),("A","5","2"),
("B","5","2"),("C","5","2"),("A","6","2"),("B","6","2"),("C","6","2"),("A","7","2"),("B","7","2"),
("C","7","2"),("A","8","2"),("B","8","2"),("C","8","2"),("A","9","2"),("B","9","2"),("C","9","2"),
("A","10","3"),("B","10","3"),("C","10","3"),("A","11","3"),("B","11","3"),("C","11","3"),("A","12","3"),
("B","12","3"),("C","12","3"),("A","13","3"),("B","13","3"),("C","13","3"),("A","14","3"),("B","14","3"),
("C","14","3");
select* from seccion;
select* from seccion where idgrado="1" ;
select s.idseccion,n.descripcion_nivel, g.descripcion_grado, s.descripcion_seccion from  seccion s inner join grado g on g.idgrado=s.idgrado inner join nivel n on n.idnivel=s.idnivel;
select n.descripcion_nivel, g.descripcion_grado, s.descripcion_seccion from  seccion s inner join grado g on g.idgrado=s.idgrado inner join nivel n on n.idnivel=s.idnivel;
select g.descripcion_grado, s.descripcion_seccion from  seccion s inner join grado g on g.idgrado=s.idgrado;
select g.descripcion_grado, s.descripcion_seccion from  seccion s inner join grado g on g.idgrado=s.idgrado where g.idgrado="4";

create table cursos(
idcurso int auto_increment,
codigo_curso varchar(4),
descripcion_curso varchar(35),
idnivel int,
idgrado int,
idseccion int,
primary key  (idcurso,codigo_curso)
);
alter table cursos add constraint fk_cursos_seccion foreign key(idseccion)  references seccion(idseccion);
alter table cursos  add constraint fk_cursos_grado foreign key(idgrado) references grado(idgrado);
alter table cursos add constraint fk_cursos_nivel foreign key(idnivel) references nivel(idnivel);
alter table cursos add constraint fk_cursos_capacidades foreign key(idcurso) references capacidades(idcurso);


insert into cursos (codigo_curso,descripcion_curso,idnivel,idgrado,idseccion)values 
("MAT","MATEMATICA","1","1","1"),("COM","COMUNICACION","1","1","1"),("ART","ARTE","1","2","2"),
("ING","INGLES","1","3","3"),("MP","MATEMATICA Pr","2","4","4"),("CP","COMUNICACION Pr","2","4","4"),
("PP","PERSONAL SOCIAL","2","5","4"),("CP","CIENCIA Y AMBIENTE","2","5","5"),("IP","INGLES","2","6","5"),
("PT","COMPUTACION","2","6","6"),("RP","RAZ MATEMATICO","2","7","6"),("VP","RAZ VERBAL","2","7","6"),
("CO","COMUNICACION Pr","3","10","4"),("CL","COMPUTACION/LABORES","3","10","4"),
("ZD","TOTAL DE MERITOS","3","10","4"),("AR","ARTE","3","11","5"),("LA","LABORES","3","11","5"),
("MA","MATEMATICA S","3","12","6"),("ZO","COMPUTACION","3","12","6");
select*from cursos;
update cursos set idperiodo="1" ;
set SQL_SAFE_UPDATES=0;
 select c.idcurso,c.codigo_curso, c.descripcion_curso, n.descripcion_nivel, g.descripcion_grado, s.descripcion_seccion from  cursos c
inner join seccion s on c.idseccion=s.idseccion inner join grado g on c.idgrado=g.idgrado inner join nivel n on c.idnivel=n.idnivel;

alter table cursos drop iddocente;
alter table cursos drop foreign key fk_cursos_docente; foreign key(iddocente) references docente(iddocente);
update cursos set iddocente="1" where idnivel="1";
select c.codigo_curso, c.descripcion_curso, g.descripcion_grado, s.descripcion_seccion from  cursos c
inner join seccion s on c.idseccion=s.idseccion inner join grado g on c.idgrado=g.idgrado inner join nivel n on c.idnivel=n.idnivel inner join docente d on d.iddocente=c.iddocente
where d.codigo_docente="A070";


insert into cursos(codigo_curso,descripcion_curso,idnivel,idgrado,idseccion)values("ZO","ZOOLOGIA","3","12","6") 
select idcurso,descripcion_curso from cursos;
select* from cursos where idseccion="1" ;
select c.idcurso,c.codigo_curso, c.descripcion_curso, n.descripcion_nivel, g.descripcion_grado, s.descripcion_seccion from  cursos c
inner join seccion s on c.idseccion=s.idseccion inner join grado g on c.idgrado=g.idgrado inner join nivel n on c.idnivel=n.idnivel;
select c.codigo_curso, c.descripcion_curso, n.descripcion_nivel from cursos c inner join nivel n on c.idnivel=n.idnivel;
insert into cursos (codigo_curso,descripcion_curso,idnivel)values ("CA","Ciencia y Ambiente","2");
select c.codigo_curso, c.descripcion_curso, n.descripcion_nivel from  cursos c inner join nivel n on c.idnivel=n.idnivel;
select*from nivel where descripcion_nivel="Inicial";
update cursos  set codigo_curso="TEC", descripcion_curso="TECNOLOGIA",idnivel="3" where codigo_curso="PS";
select c.codigo_curso, c.descripcion_curso, n.descripcion_nivel from  cursos c inner join nivel n on c.idnivel=n.idnivel;
select c.codigo_curso, c.descripcion_curso, n.descripcion_nivel from  cursos c inner join nivel n on c.idnivel=n.idnivel where c.codigo_curso="CO";
set SQL_SAFE_UPDATES=0;
delete from cursos where idcurso="1";

select c.codigo_curso, c.descripcion_curso, g.descripcion_grado, s.descripcion_seccion from  cursos c
inner join seccion s on c.idseccion=s.idseccion inner join grado g on c.idgrado=g.idgrado ;

alter table cursos add idperiodo int ;
alter table cursos add constraint fk_cursos_periodo foreign key(idperiodo) references periodo(idperiodo);


create table capacidades(
idcapacidad int auto_increment primary key,
idcurso int,
idnivel int,
idgrado int,
idperiodo int,
descripcion_capacidad varchar(40),
abreviatura varchar(20),
orden int
);
select*from capacidades;

insert into capacidades values
('1','1','1','1','hjk','f','1');


alter table capacidades add constraint fk_capacidades_periodo foreign key(idperiodo) references periodo(idperiodo);
alter table capacidades add constraint fk_capacidades_cursos foreign key(idcurso) references cursos(idcurso);
alter table capacidades add constraint fk_capacidades_grado foreign key(idgrado) references grado(idgrado);
alter table capacidades add constraint fk_capacidades_nivel foreign key(idnivel) references cursos(idnivel);

insert into capacidades
(idnivel,idgrado,idcurso,descripcion_capacidad,abreviatura,orden,idperiodo)
values
("2","4","5","Comprension y desarrollo","Comp y Des","1","1"),
("2","4","5","Dominio Corporal","Dom y Corp","2","1"),
("2","4","5","Convenio Interaccion","Con Interac","3","1"),
("2","4","6","Actitud ante el Area","Actitude","1","2"),
("2","4","6","Exposiciones","Expo","2","2");
select*from capacidades;
select* from capacidades where idcurso="5";
select cp.descripcion_capacidad,cp.abreviatura,cp.orden,c.descripcion_curso,n.descripcion_nivel,gr.descripcion_grado,pd.periodo from capacidades cp 
inner join periodo pd on cp.idperiodo=pd.idperiodo inner join cursos c on c.idcurso=cp.idcurso inner join grado gr on gr.idgrado=cp.idgrado inner join nivel n on n.idnivel=cp.idnivel;

select*from periodo where periodo="2018";

select cp.descripcion_capacidad,cp.abreviatura,cp.orden,c.descripcion_curso,n.descripcion_nivel,gr.descripcion_grado,pd.periodo from capacidades cp 
inner join cursos c on c.idcurso=cp.idcurso inner join grado gr on gr.idgrado=cp.idgrado inner join nivel n on n.idnivel=cp.idnivel
inner join periodo pd on cp.idperiodo=pd.idperiodo where c.descripcion_curso="COMUNICACION Pr";

select cp.descripcion_capacidad,cp.abreviatura,cp.orden from capacidades cp 
inner join cursos c on c.idcurso=cp.idcurso inner join grado gr on gr.idgrado=cp.idgrado inner join nivel n on n.idnivel=cp.idnivel
inner join periodo pd on cp.idperiodo=pd.idperiodo where c.descripcion_curso="COMUNICACION Pr";
select cp.descripcion_capacidad,cp.abreviatura,cp.orden from capacidades cp;

select distinct pd.periodo from capacidades cp 
inner join cursos c on c.idcurso=cp.idcurso inner join grado gr on gr.idgrado=cp.idgrado inner join nivel n on n.idnivel=cp.idnivel
inner join periodo pd on cp.idperiodo=pd.idperiodo where c.descripcion_curso="COMUNICACION Pr";

or c.idnivel="2" or gr.idgrado="4";
select*from cursos where idgrado="4";
select cp.descripcion_capacidad,cp.abreviatura,cp.orden from capacidades cp inner join cursos c on c.idcurso=cp.idcurso inner join grado gr on gr.idgrado=cp.idgrado where c.codigo_curso="MP" and gr.descripcion_grado="Primer Grado de Primaria " ;
select cp.descripcion_capacidad,cp.abreviatura,cp.orden from capacidades cp inner join cursos c on c.idcurso=cp.idcurso where c.descripcion_curso="MATEMATICA";
select cp.descripcion_capacidad,cp.abreviatura,cp.orden from capacidades cp;

select distinct idseccion, descripcion_seccion from seccion where descripcion_seccion="A";
create table docente(
idpersonal int,
iddocente int auto_increment,
codigo_docente varchar(4),
idcurso int,
idgrado int,
idseccion int,
idnivel int,
idperiodo int,
primary key(iddocente,codigo_docente)
);

alter table docente drop idcurso;
alter table docente drop foreign key fk_docente_cursos;
alter table docente add constraint fk_docente_cursos foreign key(idcurso) references cursos(idcurso);
alter table docente add constraint fk_docente_seccion foreign key(idseccion) references seccion(idseccion);
alter table docente add constraint fk_docente_grado foreign key(idgrado) references grado(idgrado);
alter table docente add constraint fk_docente_nivel foreign key(idnivel) references nivel(idnivel);
alter table docente add constraint fk_docente_periodo foreign key(idperiodo) references periodo(idperiodo);
insert into docente (idpersonal,codigo_docente,idcurso,idseccion,idgrado,idnivel,idperiodo) values
("1","A070","1","1","1","1","1"),("2","A071","6","4","4","2","2"),("3","A072","14","4","10","3","2");
select*from docente;
insert into docente (idpersonal,codigo_docente,idcurso,idseccion,idgrado,idnivel,idperiodo) values
("1","A070","2","1","1","1","1");
select 1,d.codigo_docente,20,36,7,2,1 from docente d
inner join personal p on p.idpersonal=d.idpersonal inner join cursos c on c.idcurso=d.idcurso inner join seccion s on s.idseccion=d.idseccion inner join grado g on g.idgrado=d.idgrado inner join nivel n on n.idnivel=d.idnivel inner join periodo pd on pd.idperiodo=d.idperiodo
where d.codigo_docente='A070';
select p.apellidonombre,d.codigo_docente,c.descripcion_curso,s.descripcion_seccion,g.descripcion_grado,n.descripcion_nivel,pd.periodo from docente d
inner join personal p on p.idpersonal=d.idpersonal inner join cursos c on c.idcurso=d.idcurso inner join seccion s on s.idseccion=d.idseccion inner join grado g on g.idgrado=d.idgrado inner join nivel n on n.idnivel=d.idnivel inner join periodo pd on pd.idperiodo=d.idperiodo;
select d.codigo_docente,p.apellidonombre,pd.periodo from docente d inner join personal p on p.idpersonal=d.idpersonal inner join periodo pd on pd.idperiodo=d.idperiodo;
select d.codigo_docente,p.apellidonombre,pd.periodo from docente d inner join personal p on p.idpersonal=d.idpersonal inner join periodo pd on pd.idperiodo=d.idperiodo where codigo_docente="A072";

select *from personal p inner join docente d on d.idpersonal=p.idpersonal where d.idcurso="6";
select c.codigo_curso,c.descripcion_curso,g.descripcion_grado,s.descripcion_seccion from docente d
inner join cursos c on c.idcurso=d.idcurso inner join seccion s on s.idseccion=d.idseccion inner join grado g on g.idgrado=d.idgrado where d.codigo_docente="A072";


create table alumnos(
idalumno int auto_increment,
nombre varchar(50),
codigo_alumno varchar(15),
dni_alumno varchar(10),
idpersonal int,
idnivel int,
idgrado int,
idseccion int,
idperiodo int,
primary key(idalumno,codigo_alumno));
alter table alumnos add constraint fk_alumnos_personal foreign key(idpersonal) references personal(idpersonal);
alter table alumnos add constraint fk_alumnos_nivel foreign key(idnivel) references nivel(idnivel);
alter table alumnos add constraint fk_alumnos_grado foreign key(idgrado) references grado(idgrado);
alter table alumnos add constraint fk_alumnos_seccion foreign key(idseccion) references seccion(idseccion);
alter table alumnos add constraint fk_alumnos_periodo foreign key(idperiodo) references periodo(idperiodo);
insert into alumnos(nombre,codigo_alumno,dni_alumno,idpersonal,idnivel,idgrado,idseccion,idperiodo) values
("Abanto Urcia Jorge","2222222","478411","1","1","1","1","1"),
("Arana Tocas Julio","333333","78459","1","1","1","1","1"),("Castañeda Nomberto Kiara","444444","514269","1","1","1","1","1"),
("Diaz Revoredo Maria","555555","35680","2","2","4","4","2"),("Espinoza Fonseza Roberth","666666","12245","2","2","4","4","2"),
("Flores Ferre Maria","77777","75625","2","2","4","4","2"),("Garcia Flores Jose","888888","364525","3","3","10","4","2"),
("Grados Barba Nestor","999999","12026","3","3","10","4","2"),("Huerta Suclupe Carlos","1010100","988455","3","3","10","4","2");
select *from alumnos;
select a.codigo_alumno,a.nombre,a.dni_alumno,p.apellidonombre,n.descripcion_nivel,g.descripcion_grado,s.descripcion_seccion,pd.periodo from alumnos a
inner join personal p on p.idpersonal=a.idpersonal inner join nivel n on n.idnivel=a.idnivel inner join grado g on g.idgrado=a.idgrado inner join seccion s on s.idseccion=a.idseccion inner join periodo pd on pd.idperiodo=a.idperiodo;


create table notas(
idregistro int auto_increment primary key,
idalumno int,
idpersonal int,
idnivel int,
idgrado int,
idseccion int,
idcurso int,
idcapacidad int,
nota1 int,
nota2 int,
nota3 int,
nota4 int,
promedio double,
idperiodo int
);
alter table notas add constraint fk_notas_alumnos foreign key(idalumno) references alumnos(idalumno);
alter table notas add constraint fk_notas_personal foreign key(idpersonal) references personal(idpersonal);
alter table notas add constraint fk_notas_nivel foreign key(idnivel) references nivel(idnivel);
alter table notas add constraint fk_notas_grado foreign key(idgrado) references grado(idgrado);
alter table notas add constraint fk_notas_seccion foreign key(idseccion) references seccion(idseccion);
alter table notas add constraint fk_notas_cursos foreign key(idcurso) references cursos(idcurso);
alter table notas add constraint fk_notas_capacidades foreign key(idcapacidad) references capacidades(idcapacidad);
alter table notas add constraint fk_notas_periodo foreign key(idperiodo) references periodo(idperiodo);

insert into notas(idalumno,idpersonal,idnivel,idgrado,idseccion,idcurso,idcapacidad,nota1,nota2,nota3,nota4,idperiodo)values
("4","2","2","4","4","6","4","15","16","17","14","2"),
("4","2","2","4","4","6","5","20","18","19","20","2"),
("5","2","2","4","4","6","4","15","14","12","13","2"),
("5","2","2","4","4","6","5","17","16","15","16","2"),
("6","2","2","4","4","6","4","14","13","12","11","2"),
("6","2","2","4","4","6","5","11","12","11","13","2");
select*from notas;
select nt.idregistro,a.nombre,p.apellidonombre,n.descripcion_nivel,g.descripcion_grado,s.descripcion_seccion,c.descripcion_curso,cp.descripcion_capacidad,nt.nota1,nt.nota2,nt.nota3,nt.nota4,nt.promedio,pd.periodo from notas nt
inner join alumnos a on a.idalumno=nt.idalumno inner join personal p on p.idpersonal=nt.idpersonal inner join nivel n on n.idnivel=nt.idnivel inner join grado g on g.idgrado=nt.idgrado
inner join seccion s on s.idseccion=nt.idseccion inner join cursos c on c.idcurso=nt.idcurso inner join capacidades cp on cp.idcapacidad=nt.idcapacidad inner join periodo pd on pd.idperiodo=nt.idperiodo;

select nt.idregistro,a.nombre,n.descripcion_nivel,g.descripcion_grado,s.descripcion_seccion,c.descripcion_curso,cp.descripcion_capacidad,nt.nota1,nt.nota2,nt.nota3,nt.nota4,nt.promedio,pd.periodo from notas nt
inner join alumnos a on a.idalumno=nt.idalumno inner join personal p on p.idpersonal=nt.idpersonal inner join nivel n on n.idnivel=nt.idnivel inner join grado g on g.idgrado=nt.idgrado
inner join seccion s on s.idseccion=nt.idseccion inner join cursos c on c.idcurso=nt.idcurso inner join capacidades cp on cp.idcapacidad=nt.idcapacidad inner join periodo pd on pd.idperiodo=nt.idperiodo
where cp.idcapacidad="4";

select nt.idregistro,a.nombre,nt.nota1,nt.nota2,nt.nota3,nt.nota4,nt.promedio((nt.nota1+nt.nota+nt.nota3+nt.nota4)/4) from notas nt inner join alumnos a on a.idalumno=nt.idalumno inner join personal p on p.idpersonal=nt.idpersonal inner join nivel n on n.idnivel=nt.idnivel inner join grado g on g.idgrado=nt.idgrado
inner join seccion s on s.idseccion=nt.idseccion inner join cursos c on c.idcurso=nt.idcurso inner join capacidades cp on cp.idcapacidad=nt.idcapacidad inner join periodo pd on pd.idperiodo=nt.idperiodo
where cp.idcapacidad="4";


select nt.idregistro,a.nombre,nt.nota1,nt.nota2,nt.nota3,nt.nota4,nt.promedio from notas nt
inner join alumnos a on a.idalumno=nt.idalumno inner join personal p on p.idpersonal=nt.idpersonal inner join nivel n on n.idnivel=nt.idnivel inner join grado g on g.idgrado=nt.idgrado
inner join seccion s on s.idseccion=nt.idseccion inner join cursos c on c.idcurso=nt.idcurso inner join capacidades cp on cp.idcapacidad=nt.idcapacidad inner join periodo pd on pd.idperiodo=nt.idperiodo
where p.apellidonombre="Jesús Mejía"  and cp.descripcion_capacidad="Actitud ante el Area";

set SQL_UPDATE__SAFE=0;
/*drop table docente_curso;*/
create table docente_curso(
iddocente int,
idcurso int
);
alter table docente_curso add constraint fk_docente_curso_cursos foreign key (idcurso) references cursos(idcurso);
alter table docente_curso add constraint fk_curso_docente foreign key (iddocente) references docente(iddocente);
insert into docente_curso
(iddocente,idcurso) values ("1","1"),("2","6");
select c.codigo_curso,c.descripcion_curso, n.descripcion_nivel,g.descripcion_grado,s.descripcion_seccion, pd.periodo, p.apellidonombre from
docente_curso dc inner join cursos c on c.idcurso=dc.idcurso inner join nivel n on n.idnivel=c.idnivel inner join grado g on g.idgrado=c.idgrado
inner join seccion s on s.idseccion=c.idseccion inner join periodo pd on pd.idperiodo=c.idperiodo  
inner join docente d on d.codigo_docente=dc.codigo_docente 
inner join personal p on p.idpersonal=d.iddocente where dc.codigo_docente="A070";
select * from docente_curso where iddocente=2 and idcurso=7;
insert into docente_curso
(iddocente,idcurso) values (2,7);

select * from nivel where descripcion_nivel="Primaria";
update docente_curso set iddocente=1 where idcurso=1;


insert into capacidades (idnivel,idgrado,idcurso,descripcion_capacidad,abreviatura,orden,idperiodo)values(1,1,1,"VDSDVS","DD",1,1)


select *from personal p inner join docente_curso dc on dc.iddocente=p.idpersonal where dc.idcurso=6;


select nt.idregistro,a.nombre,nt.nota1,nt.nota2,nt.nota3,nt.nota4,((nt.nota1+nt.nota2+nt.nota3+nt.nota4)/4) as promedio,pd.periodo from notas nt
inner join alumnos a on a.idalumno=nt.idalumno inner join personal p on p.idpersonal=nt.idpersonal 
inner join nivel n on n.idnivel=nt.idnivel inner join grado g on g.idgrado=nt.idgrado
inner join seccion s on s.idseccion=nt.idseccion inner join cursos c on c.idcurso=nt.idcurso 
inner join capacidades cp on cp.idcapacidad=nt.idcapacidad 
inner join periodo pd on pd.idperiodo=nt.idperiodo ;

select idcurso,descripcion_curso from  cursos c where idnivel=2 and idgrado=4;
select descripcion_curso from  cursos c inner join grado g on c.idgrado=g.idgrado where g.descripcion_grado=4;

select * from cursos c where c.descripcion_curso='INGLES' and c.idgrado=3 and c.idnivel=1;


select a.nombre,nt.nota1,cp.descripcion_capacidad  from notas nt 
inner join alumnos a on a.idalumno=nt.idalumno inner join personal p on p.idpersonal=nt.idpersonal 
inner join nivel n on n.idnivel=nt.idnivel inner join grado g on g.idgrado=nt.idgrado
inner join seccion s on s.idseccion=nt.idseccion inner join cursos c on c.idcurso=nt.idcurso 
inner join capacidades cp on cp.idcapacidad=nt.idcapacidad 
inner join periodo pd on pd.idperiodo=nt.idperiodo where nt.idcurso="6" group by (cp.descripcion_capacidad);


select nt.idregistro,a.nombre,nt.nota1,nt.nota2,nt.nota3,nt.nota4,round(((nt.nota1+nt.nota2+nt.nota3+nt.nota4)/4),1),cp.descripcion_capacidad,c.descripcion_curso,g.descripcion_grado,n.descripcion_nivel,p.apellidonombre,pd.periodo from notas nt 
inner join alumnos a on a.idalumno=nt.idalumno inner join personal p on p.idpersonal=nt.idpersonal 
inner join nivel n on n.idnivel=nt.idnivel inner join grado g on g.idgrado=nt.idgrado
inner join seccion s on s.idseccion=nt.idseccion inner join cursos c on c.idcurso=nt.idcurso 
inner join capacidades cp on cp.idcapacidad=nt.idcapacidad 
inner join periodo pd on pd.idperiodo=nt.idperiodo where p.apellidonombre='Jesús Mejía' and cp.descripcion_capacidad='Actitud ante el Area' and pd.periodo='2019' order by round(((nt.nota1+nt.nota2+nt.nota3+nt.nota4)/4),1) ASC ;

select nt.idregistro,a.nombre,nt.nota1,round(((nt.nota1+nt.nota2+nt.nota3+nt.nota4)/4),1),cp.descripcion_capacidad,c.descripcion_curso,g.descripcion_grado,n.descripcion_nivel,p.apellidonombre,pd.periodo from notas nt 
inner join alumnos a on a.idalumno=nt.idalumno inner join personal p on p.idpersonal=nt.idpersonal 
inner join nivel n on n.idnivel=nt.idnivel inner join grado g on g.idgrado=nt.idgrado
inner join seccion s on s.idseccion=nt.idseccion inner join cursos c on c.idcurso=nt.idcurso 
inner join capacidades cp on cp.idcapacidad=nt.idcapacidad ;

