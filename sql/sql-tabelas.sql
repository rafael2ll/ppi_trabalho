CREATE TABLE pessoa
(
    codigo   int PRIMARY KEY auto_increment,
    nome     varchar(50),
    sexo     varchar(9),
    email    varchar(50) UNIQUE,
    telefone varchar(50),
    cep      char(15),
    endereco varchar(100),
    cidade   varchar(50),
    estado   varchar(3)
) ENGINE = InnoDB;


CREATE TABLE funcionario
(
    codigo        int PRIMARY KEY,
    data_contrato datetime,
    salario       float(8, 2),
    senha_hash    varchar(255),
    foreign key (codigo) REFERENCES pessoa (codigo) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE medico
(
    codigo        int PRIMARY KEY,
    especialidade varchar(30),
    crm           varchar(30),
    foreign key (codigo) REFERENCES funcionario (codigo) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE agenda
(
    codigo      int PRIMARY KEY auto_increment,
    data_agenda date,
    horario     time,
    nome        varchar(50),
    sexo        varchar(9),
    email       varchar(50),
    cod_med     int not null,
    foreign key (cod_med) REFERENCES medico (codigo) ON DELETE CASCADE,
    constraint unique_agendamento unique (cod_med, horario, data_agenda)
) ENGINE = InnoDB;

CREATE TABLE paciente
(
    codigo         int PRIMARY KEY,
    peso           float,
    altura         int,
    tipo_sanguineo varchar(8),
    FOREIGN KEY (codigo) REFERENCES pessoa (codigo) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE base_endereco
(
    id       int PRIMARY KEY auto_increment,
    cep      char(10),
    endereco varchar(100),
    cidade   varchar(50)
) ENGINE = InnoDB;
