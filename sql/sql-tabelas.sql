CREATE TABLE pessoa
(
   id int PRIMARY KEY auto_increment,
   codigo varchar(50) UNIQUE,
   nome varchar(50),
   sexo varchar(9),
   email varchar(50) UNIQUE,
   telefone varchar(50),
   cep char(15),
   endereco varchar(100),
   cidade varchar(50),
   estado varchar(3)
) ENGINE=InnoDB;


CREATE TABLE funcionario
(
   codigo int AUTO_INCREMENT not null,
   data_contrato datetime,
   salario float(8,2),
   senha_hash varchar(255),
   cod_func int not null,
   primary key(codigo),
   foreign key(cod_func) REFERENCES pessoa(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE medico
(
   codigo int AUTO_INCREMENT not null,
   especialidade varchar(30),
   crm varchar(30),
   cod_med int not null,
   primary key(codigo),
   foreign key(cod_med) REFERENCES funcionario(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE agenda
(
   codigo int AUTO_INCREMENT not null,
   agenda_data date,
   horario varchar(5),
   nome varchar(50),
   sexo varchar(9),
   email varchar(50),
   cod_med int not null,
   primary key(codigo),
   foreign key(cod_med) REFERENCES medico(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE paciente
(
   id int PRIMARY KEY auto_increment,
   codigo varchar(50),
   peso float,
   altura int,
   tipo_sanguineo varchar(8),
   id_pessoa int not null,
   FOREIGN KEY (id_pessoa) REFERENCES pessoa(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE endereco
(
   id int PRIMARY KEY auto_increment,
   cep char(10),
   endereco varchar(100),
   cidade varchar(50)
) ENGINE=InnoDB;
